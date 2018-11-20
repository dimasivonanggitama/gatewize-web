<?php

use Illuminate\Database\Seeder;
use App\User as User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        User::create([
            'email' => "admin@admin.com",
            'fullname' => "Administrator",
            'username' => "admin",
            'address' => "Surabaya",
            'balance' => 10000,
            'password' => bcrypt('123456'),
            'type' => 'admin'
        ]);
        for ($i=1; $i <= 5; $i++) { 
            $email = $faker->email;
            User::create([
                'email' => $email,
                'fullname' => $faker->firstNameMale . ' ' . $faker->lastName,
                'username' => $email,
                'address' => $faker->address,
                'balance' => 10000,
                'password' => Hash::make('secret'),
                'type' => 'user'
            ]);
        }
    }
}
