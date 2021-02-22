<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameCollection;
use App\Http\Resources\score;
use App\Http\Resources\scoreCollection;
use App\Models\Game;
use App\Models\Player;
use App\Models\scores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class scorecontroller extends Controller
{
    public function index(){
        return $this->getScores();
    }

    public function show($id){
        return new scoreCollection(
            scores::query()->select("scores.id", "players.player_name", "games.game_name", "score")->from("scores")
                ->join("games", "games.id", "=", "game_id")
                ->join("players", "players.id", "=", "player_id")
                ->where('players.id', '=', $id)
                ->get());
    }

    public function store(Request $request){
        scores::query()->insert(
            array('player_id'=>$request->player_id, 'game_id'=>$request->game_id, 'score'=>$request->score)
        );

        return $this->getScores();
    }

    public function update($id, Request $request){
        scores::query()->where('id', $id)->update($request->all());

        return $this->getScores();
    }

    public function delete($id){
        scores::query()->findOrFail($id)->delete();

        return $this->getScores();
    }

    public function updateWhole($id, Request $request){
        $score = scores::find($id);
        $score->score = $request->score;
        $score->save();
        Player::find($score->player_id)->update($request->all());
        Game::find($score->game_id)->update($request->all());
        return $this->getScores();
    }

    private function getScores()
    {
        return new scoreCollection(
            scores::query()->select("scores.id", "players.player_name", "games.game_name", "score")->from("scores")
                ->join("games", "games.id", "=", "game_id")
                ->join("players", "players.id", "=", "player_id")
                ->get());
    }
}
