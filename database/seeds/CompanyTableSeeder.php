<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('companies')->delete();
        \DB::table('companies')->insert([
            ['name'=>'B1'],
            ['name'=>'B2F'],
            ['name'=>'B3'],
            ['name'=>'B4'],
            ['name'=>'B5'],
            ['name'=>'CROP'],
        ]);
    }
}
