<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectsCategory extends Model
{
    protected $table = 'subjectscategories';
    protected $fillable = ['id', 'name', 'description'];
    public $timestamps = true;
}
