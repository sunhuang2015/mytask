<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskForm extends Model
{
    //
    protected $fillable=[
        'task_id',
        'device_id',
        'qty'
    ];

    public function device(){
        return $this->belongsTo('App\Device');
    }

    public function task(){
        return $this->belongsTo('App\Task');
    }
}
