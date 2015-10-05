<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->delete();
        $user=new \App\User();
        $user->email="admin@sample.com";
        $user->password=bcrypt("123456");
        $user->name='admin';
        $user->save();
    }
}
