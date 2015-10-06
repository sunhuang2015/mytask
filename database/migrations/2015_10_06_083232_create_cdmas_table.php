<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_number')->unique();
            $table->string('employee_name');
            $table->integer('company_id')->unsigned();
            $table->string('department_name');
            $table->string('costcenter');
            $table->string('phone_number')->unique();
            $table->string('remark')->nullable();
            $table->integer('status_id')->unsigned();
            $table->string('attachment')->nullable();
            $table->date('expried_date')->default('2019-01-01');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('cdmas');
    }
}
