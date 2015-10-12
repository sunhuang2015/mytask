<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NetworkDevice extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'name',
        'ip',
        'model_id',
        'rack_id',
        'status_id',
        'company_id',
        'location',
        'remark',
        'snmp'
    ];

    public function model(){
        return $this->belongsTo('App\NetworkModel');
    }

    public function rack(){
        return $this->belongsTo('App\Rack');
    }
    public function status(){
        return $this->belongsTo('App\Status');
    }
    public function company(){
        return $this->belongsTo('App\Company');
    }
}
