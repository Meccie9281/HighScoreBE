<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scores extends Model
{
    protected $fillable = ['id', 'player_id','player_name', 'game_id','game_name', 'score', 'created_at', 'updated_at'];
}
