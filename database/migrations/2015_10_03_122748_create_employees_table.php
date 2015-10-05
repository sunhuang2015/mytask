<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('number')->unique();
            $table->string('phone_number');
            $table->integer('category_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('department_name');
            $table->string('costcenter');
            $table->string('bank_account')->nullable();
            $table->string("bank_info")->nullable();


            $table->timestamps();
            $table->softDeletes();
            $table->date('expired_date')->default('2019-01-01');
            $table->integer('user_id')->default(1);



            $table->foreign('category_id')->references('id')->on('employee_categories')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('employee_levels')->onDelete('cascade');
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
        Schema::drop('employees');
    }
}
