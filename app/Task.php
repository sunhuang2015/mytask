<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
        'company_id',
        'step_id',
        'category_id',
        'applicant',
        'phone',
        'subject',
        'reason',
        'remark',
        'qty_network',
        'qty_telecom',
        'name',
        'costcenter'
    ];

    protected  $dates=['deleted_at'];


    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function step(){
        return $this->belongsTo('App\TaskStep');
    }

    public function category(){
        return $this->belongsTo('App\TaskCategory');
    }

    public function log(){
        return $this->hasMany('App\TaskLog');
    }


    public function setNameAttribute($name){
        $this->attributes['name']=strtoupper(trim($name));
    }


}
