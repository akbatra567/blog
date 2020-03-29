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
        DB::table('users')->insert([
            'name' => 'Akshit Batra',
            'email' => 'akbatra567'.'@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
