<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskMaster extends Model
{
    protected $table = 'task_masters';
    protected $fillable = ['id', 'title', 'class', 'semester', 'subjectscategories_id','total_task' ,'timeout'];
    public $timestamps = true;

    public function subjectscategory()
    {
        return $this->belongsTo('App\SubjectsCategory', 'subjectscategories_id', 'id');
        //belongsTo fk(foreign key) di app\SubjectsCategory
    }

    public function tasks()
    {
        return $this->hasMany('App\Task', 'taskmaster_id', 'id');
        //hasmany, id di app\task
    }

    public function taskanswers()
    {
        return $this->hasMany('App\Task', 'taskmaster_id', 'id')->with('answers');
        //kenapa di taskmaster master fungsi ini? karena dia find task master yang di api.
        //lalu, dia hasMany(dan ambil dari model Task, dari fungsi taskmaster diambil id-nya, jadi tasjmaster_id
        //&& id-tu dari id model TASK......lalu with anwers,
        //maksudnya sekalian ngambil fungsi answers yang ada di model task)
        //hasmany, id di app\task
    }

    public function studenttasks()
    {
        return $this->hasMany('App\StudentTask', 'studenttask_id', 'id');
    }
}
