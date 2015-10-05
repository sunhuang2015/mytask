<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['name'];
    protected  $dates=['deleted_at'];
    public function department(){
        return $this->hasMany('App\Department');
    }

    public function task(){
        return $this->hasMany('App\Task');
    }
}
