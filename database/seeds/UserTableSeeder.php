<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sam',
            'email' => 'sam@gmail.com',
            'password' => bcrypt('test1234'),
            'type' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'smith',
            'email' => 'smith@gmail.com',
            'password' => bcrypt('test1234'),
            'type' => 'user'
        ]);
    }
}
