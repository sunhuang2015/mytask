<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cdma extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
        'employee_number',
        'employee_name',
        'company_id',
        'department_name',
        'costcenter',
        'phone_number',
        'remark',
        'status_id',
        'attachment',
        'expried_date'
    ];
    protected $dates=['deleted_at'];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function setDepartmentNameAttribute($department_name){
        $this->attributes['department_name']=strtoupper(trim($department_name));
    }
    public function setEmployeeNameAttribute($employee_name){
        $this->attributes['employee_name']=strtoupper(trim($employee_name));
    }
/*$table->string('employee_number')->unique();
$table->string('employee_name');
$table->integer('company_id')->unsigned();
$table->string('department_name');
$table->string('costcenter');
$table->string('phone_number')->unique();
$table->string('remark')->nullable();
$table->integer('status_id')->unsigned();
$table->string('attachment')->nullable();*/
}
