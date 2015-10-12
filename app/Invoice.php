<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'employee_id',
        'months',
        'fee',
        'employee_number',
        'isSubmited',
        'company_id',
        'invoice'
    ];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    public function company(){
        return $this->belongsTo('App\Company');
    }
}
