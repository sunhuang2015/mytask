<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    //
    use SoftDeletes;
    //protected $dates="deleted_at";
    protected $fillable=[
        'number',
        'name',
        'company_id',
        'category_id',
        'level_id',
        'bank_account',
        'department_name',
        'bank_info',
        'user_id',
        'status_id',
        'expired_date',
        'costcenter',
        'phone_number'
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }
    public function level(){
        return $this->belongsTo('App\EmployeeLevel');
    }
    public function category(){
        return $this->belongsTo('App\EmployeeCategory');
    }

    public function mobilefee(){
        return $this->hasMany('App\MobileFees');
    }

}
