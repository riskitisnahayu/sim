<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTask extends Model
{
    protected $table = 'student_tasks';
    protected $fillable = ['id', 'student_id', 'taskmaster_id', 'score', 'true_answer', 'wrong_answer', 'duration'];
    public $timestamps = true;
}
