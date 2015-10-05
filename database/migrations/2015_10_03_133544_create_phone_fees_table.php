<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->date('months');
            $table->integer('payment_company_id')->unsigned()->index();
            $table->string('remark')->nullable();
            $table->decimal('fee',8,2);
            $table->timestamps();
            $table->unique(['phone','months','payment_company_id']);
            $table->foreign('payment_company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phone_fees');
    }
}
