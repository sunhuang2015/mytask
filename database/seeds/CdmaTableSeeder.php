<?php

use Illuminate\Database\Seeder;
use App\Cdma;
class CdmaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=\Faker\Factory::create();
        Cdma::truncate();
        foreach(range(1,10000) as $index){
            Cdma::create([
                'employee_number'=>$faker->numberBetween(100000,400000),
                'employee_name'=>$faker->name,
                'phone_number'=>$faker->phoneNumber,
                'department_name'=>$faker->company,
                'company_id'=>2,
                'status_id'=>1
            ]);
        }

    }
}
