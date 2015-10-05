<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'number',
        'company_id',
        'isShared',
        'isActived',
        'payment_company_id',
        'department_name',
        'category_id',

    ];

   public function company(){
       return $this->belongsTo('App\Company');
   }

    public function paymentCompany(){
        return $this->belongsTo('App\Company');
    }
    public function category(){
        return $this->belongsTo('App\PhoneCategory');
    }
}
