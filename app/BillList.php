<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillList extends Model
{
    //
    use SoftDeletes;
    protected $table="bill_lists";
    protected $fillable=[
        'company_id',
        'phone',
        'months',
        'fee',
        'name',
        'remark',
        'supplier'
    ];

    public function company(){
    return $this->belongsTo('App\Company');
}
}
