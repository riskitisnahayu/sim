<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskMaster extends Model
{
    protected $table = 'task_masters';
    protected $fillable = ['id', 'title', 'class', 'subjectscategories_id'];
    public $timestamps = true;

    public function subjectscategory()
    {
        return $this->belongsTo('App\SubjectsCategory', 'subjectscategories_id', 'id');
    }
}
