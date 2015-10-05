<?php

use Illuminate\Database\Seeder;

class PhoneCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('phone_categories')->delete();
        \DB::table('phone_categories')->insert([
            ['name'=>'CDMA','code'=>1],
            ['name'=>'Mobile','code'=>2],
            ['name'=>'EXT','code'=>3],
            ['name'=>'LeaseLine','code'=>4],
            ['name'=>'Others','code'=>5],


        ]);
    }
}
