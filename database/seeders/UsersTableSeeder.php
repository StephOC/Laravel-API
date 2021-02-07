<?php

namespace Database\Seeders;

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
        // first clear the users table 
        Users::truncate();

        $faker = \Faker\Factory::create();

        /**
         * making sure everyone has the same password 
         * hash before loop to improve proformace
         */
        $password = Hash::make('topal');

        User::create([
            'name' => 'Adminstrator',
            'email' => 'admin@test.com',
            'password' => $password
        ]);

        // generate users
        for($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'apssword' => $pasword
            ]);
        }
    }
}
