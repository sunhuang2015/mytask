<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //
/*$table->string('e_desc');
$table->string('c_desc');
$table->string('e_brand');
$table->string('c_brand');
$table->string('model');
$table->string('spec');*/

    protected $fillable=[
        'e_desc',
        'c_desc',
        'e_brand',
        'c_brand',
        'model',
        'spec',
        'unit'
    ];

    public function model(){
        return $this->belongsTo('App\NetworkModel');
    }
}
