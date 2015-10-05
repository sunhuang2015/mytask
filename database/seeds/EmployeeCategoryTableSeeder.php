<?php

use Illuminate\Database\Seeder;

class EmployeeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('employee_categories')->delete();
        \DB::table('employee_categories')->insert([
            ['name'=>'CDMA User'],
            ['name'=>'Mobile User'],
            ['name'=>'Extension User']
        ]);
    }
}
