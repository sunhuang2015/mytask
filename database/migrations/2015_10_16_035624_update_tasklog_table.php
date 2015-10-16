<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTasklogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_logs', function (Blueprint $table) {
            //
            $table->string('ips_number')->nullable();
            $table->string('po_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_logs', function (Blueprint $table) {
            //
            $table->dropColumn('ips_number');
            $table->dropColumn('po_number');
        });
    }
}
