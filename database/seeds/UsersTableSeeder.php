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
        $superAdmin = factory('App\Role')->create([
            'name' => 'Super Admin'
        ]);
        $normalUser = factory('App\Role')->create([
            'name' => 'Normal User'
        ]);

        $billingUser = factory('App\Role')->create([
            'name' => 'Billing'
        ]);

        $supportUser = factory('App\Role')->create([
            'name' => 'Support'
        ]);

        $premiumUser = factory('App\Role')->create([
            'name' => 'Premium User'
        ]);

        User::create([
            'email' => "admin@admin.com",
            'fullname' => "Administrator",
            'username' => "admin",
            'address' => "Surabaya",
            'balance' => 10000,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'license_key' => 'a32a3507234f2d69bb1c35849da52643',
            'role_id' => $superAdmin->id
        ]);

        User::create([
            'email' => "support@admin.com",
            'fullname' => "Administrator",
            'username' => "support",
            'address' => "Surabaya",
            'balance' => 10000,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'license_key' => 'a32a3507234f2d69bb1c35849da52643',
            'role_id' => $supportUser->id
        ]);

        User::create([
            'email' => "billing@admin.com",
            'fullname' => "Administrator",
            'username' => "billing",
            'address' => "Surabaya",
            'balance' => 10000,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'license_key' => 'a32a3507234f2d69bb1c35849da52643',
            'role_id' => $billingUser->id
        ]);

        User::create([
            'email' => "premium@admin.com",
            'fullname' => "Administrator",
            'username' => "premium",
            'address' => "Surabaya",
            'balance' => 10000,
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'license_key' => 'a32a3507234f2d69bb1c35849da52643',
            'role_id' => $premiumUser->id
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
                'email_verified_at' => now(),
                'license_key' => 'a32a3507234f2d69bb1c35849da52643',
                'role_id' => $normalUser->id
            ]);
        }
    }
}
