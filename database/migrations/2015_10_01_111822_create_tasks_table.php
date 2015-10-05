<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('step_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('name')->unique();
            $table->string('applicant');
            $table->string('phone');
            $table->integer('company_id')->unsigned();
            $table->string('costcenter');
            $table->integer('qty_network')->default(0);
            $table->integer('qty_telecom')->default(0);
            $table->text('remark')->nullable();
            $table->string('subject');
            $table->string('reason');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('step_id')->references('id')->on('task_steps')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('task_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
