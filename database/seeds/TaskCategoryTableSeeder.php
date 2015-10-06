<?php

use Illuminate\Database\Seeder;

class TaskCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('task_categories')->delete();
        \DB::table('task_categories')->insert([
            ['name'=>'工程'],
            ['name'=>'设备'],
            ['name'=>'CDMA'],

        ]);
    }
}
