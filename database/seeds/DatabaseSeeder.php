<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

       /* $this->call(UsersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(TaskCategoryTableSeeder::class);
        $this->call(TaskStepTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(EmployeeCategoryTableSeeder::class);
        $this->call(EmployeeLevelTableSeeder::class);
        $this->call(PhoneCategoryTableSeeder::class);*/
        $this->call(CdmaTableSeeder::class);
        Model::reguard();
    }
}
