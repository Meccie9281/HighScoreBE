<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlayerCollection;
use App\Http\Resources\Player as PlayerResource;
use Illuminate\Http\Request;
use \App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        return new PlayerCollection(Player::all());
    }

    public function show($id)
    {
        return new PlayerResource(Player::query()->findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $player = Player::query()->create($request->all());

        return (new PlayerResource($player))
            ->response()
            ->setStatusCode(201);
    }

    public function update($id, Request $request)
    {
        return Player::query()->where('id', $id)->update($request->all());
    }


    public function answer($id, Request $request)
    {
        $request->merge(['correct' => (bool) json_decode($request->get('correct'))]);
        $request->validate([
            'correct' => 'required|boolean'
        ]);

        $player = Player::query()->findOrFail($id);
        $player->answers++;
        $player->points = ($request->get('correct') ? $player->points + 1 : $player->points - 1);

        $player->save();

        return new PlayerResource($player);
    }

    public function destroy($id)
    {
        Player::query()->findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function resetAnswers($id)
    {
        $player = Player::query()->findOrFail($id);
        $player->answers = 0;
        $player->points = 0;

        return new PlayerResource($player);
    }


}
