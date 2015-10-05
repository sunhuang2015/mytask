<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    //
    use SoftDeletes;
    protected $dates=["deleted_at"];
    protected $fillable=['company_id','name','costcenter'];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function setNameAttribute($name){
        $this->attributes['name']=strtoupper(trim($name));
    }
}
