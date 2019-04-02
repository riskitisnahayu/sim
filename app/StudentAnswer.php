<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $table = 'student_answers';
    protected $fillable = ['id', 'student_id', 'taskmaster_id', 'task_id', 'answer', 'is_true'];
    public $timestamps = true;

    public function answers()
    {
        return $this->hasManyThrough('App\TaskMaster', 'App\Task', 'App\Answer');
    }
}
