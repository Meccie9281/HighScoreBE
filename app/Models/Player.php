<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Property;

class Player extends Model
{
    protected $fillable = ['name', 'answers', 'points'];
}
