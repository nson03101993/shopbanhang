<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_users')->insert([
            'username' => 'tomanyeuem',
            'email' => 'son123@gmail.com',
            'password' => '123456',
            'phone' => '098773482',
        ]);

    }
}
