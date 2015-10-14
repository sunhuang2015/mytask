<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phones', function (Blueprint $table) {
            //
            $table->string('employee_number')->nullable();
            $table->string('employee_name')->nullable();
            $table->date('register_date')->default('2010-01-01');
            $table->date('expired_date')->default('2019-01-01');
            $table->string('remark')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phones', function (Blueprint $table) {
            //
            $table->dropColumn(['employee_name','employee_number','expired_date','register_date','remark']);
            //$table->dropForeign('');
        });
    }
}
