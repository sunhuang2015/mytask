<?php

use Illuminate\Database\Seeder;

class EmployeeLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('employee_levels')->delete();
        \DB::table('employee_levels')->insert([
            ['name'=>'25','credit'=>88],
            ['name'=>'26','credit'=>400],
            ['name'=>'27','credit'=>1000],
            ['name'=>'28','credit'=>1000],
            ['name'=>'29','credit'=>1500],
            ['name'=>'30','credit'=>1500],
        ]);
    }
}
