<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'username' => 'Atlas一郎',
                'mail' => 'atlas1@com',
                'password' => bcrypt('1111'),
            ]

        ]);
    }
}
