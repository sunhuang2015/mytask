<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->date('months');
            $table->string('phone');
            $table->string('name');
            $table->string('fee');
            $table->string('supplier');
            $table->string('remark');
            $table->timestamps();
            $table->integer('company_id')->unsigned();
            $table->unique(['months','phone']);
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill_lists');
    }
}
