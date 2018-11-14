<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    protected $fillable = ['id', 'name', 'level', 'image', 'description', 'url'];
    public $timestamps = true;
}
