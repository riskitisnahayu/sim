<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EBook extends Model
{
    protected $table = 'ebooks';
    protected $fillable = ['id', 'image', 'title', 'subjectscategories_id', 'class', 'semester', 'author', 'publisher', 'year', 'url'];
    public $timestamps = true;

    public function subjectscategory()
    {
        return $this->belongsTo('App\SubjectsCategory', 'subjectscategories_id', 'id');
    }
}
