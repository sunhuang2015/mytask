<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('ip')->unique();;
            $table->integer('model_id')->unsigned();
            $table->integer('rack_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('location');
            $table->string('remark');
            $table->string('snmp')->default('flex!wan');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('model_id')->references('id')->on('network_models')->onDelete('cascade');
            $table->foreign('rack_id')->references('id')->on('racks')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('network_devices');
    }
}
