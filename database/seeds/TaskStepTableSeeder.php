<?php

use Illuminate\Database\Seeder;

class TaskStepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('task_steps')->delete();
        \DB::table('task_steps')->insert([

            ['name'=>'开始','code'=>1,'icon'=>'badge-grey'],
            ['name'=>'采购','code'=>2,'icon'=>'badge-success'],
            ['name'=>'订单','code'=>3,'icon'=>'badge-warning'],
            ['name'=>'收货','code'=>4,'icon'=>'badge-danger'],
            ['name'=>'施工','code'=>5,'icon'=>'badge-info'],
            ['name'=>'验收','code'=>6,'icon'=>'badge-purple'],
            ['name'=>'完工','code'=>7,'icon'=>'badge-pink'],
            ['name'=>'退单','code'=>100,'icon'=>'badge-yellow'],
        ]);
    }
}
