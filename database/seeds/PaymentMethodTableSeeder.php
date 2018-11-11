<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod as PaymentMethod;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'account_name' => 'Admin Ganteng',
            'account_number' => '111111',
            'account_type' => 'BANK',
            'account_vendor' => 'BRI',
        ]);

        PaymentMethod::create([
            'account_name' => 'Admin Keren',
            'account_number' => '121212',
            'account_type' => 'BANK',
            'account_vendor' => 'MANDIRI',
        ]);
    }
}
