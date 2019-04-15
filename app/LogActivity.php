<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activities';
    protected $fillable = ['id', 'user_id', 'game_id', 'ebook_id', 'taskmaster_id','fitur'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function user_non_admin()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->where('type','=','Siswa');
    }

    public function taskmaster()
    {
        return $this->belongsTo('App\TaskMaster','taskmaster_id','id');
    }
}
