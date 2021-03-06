<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    //
    protected $fillable=['task_id','step_id','attachment','remark','ips_number','po_number'];

    public function task(){
        return $this->belongsTo('App\Task');
    }
    public function step(){
        return $this->belongsTo('App\TaskStep');
    }
}
