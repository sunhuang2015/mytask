<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \DB::table('statuses')->delete();
        \DB::table('statuses')->insert([

           ['name'=>'On'],
            ['name'=>'Off']
        ]);
    }
}
