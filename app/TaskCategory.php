<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskCategory extends Model
{
    //

    use SoftDeletes;

    protected  $dates=['deleted_at'];
    protected $fillable=['name'];

    public function task(){
        return $this->hasMany('App\Task');
    }

    public function setNameAttribute($name){
        $this->attributes['name']=strtoupper(trim($name));
    }
}
