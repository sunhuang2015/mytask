<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rack extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'company_id',
        'building',
        'floor',
        'size',
        'name',
        'uplink_rack_id'
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }
    protected  $dates=['deleted_at'];
}
