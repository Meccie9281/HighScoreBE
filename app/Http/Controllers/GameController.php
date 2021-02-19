<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameCollection;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){
        return new GameCollection(Game::all());
    }

    public function store(Request $request){
        Game::query()->create($request->all());

        return $this->index();
    }

    public function delete($id){
        Game::query()->findOrFail($id)->delete();
        return $this->index();
    }

}
