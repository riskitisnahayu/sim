<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    protected $fillable = ['id', 'image', 'name', 'gamecategories_id', 'description', 'url'];
    public $timestamps = true;

    public function gamecategory()
    {
        return $this->belongsTo('App\GameCategory', 'gamecategories_id', 'id');
    }
}
