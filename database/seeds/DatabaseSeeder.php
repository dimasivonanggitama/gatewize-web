<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(DepositTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
    }
}
