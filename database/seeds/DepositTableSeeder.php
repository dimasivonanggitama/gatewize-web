<?php

use Illuminate\Database\Seeder;
use App\Deposit as Deposit;
use App\User as User;

class DepositTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();
        $paymentMethodId = [1,2];
        foreach ($user as $key => $value) {
            Deposit::create([
                'user_id' => $value->id,
                'payment_method_id' => rand(1,2),
                'amount' => 20000,
                'balance' => 20000,
                'sender_name' => "Ganteng",
                'status' => 'ACCEPTED',
                'unique_code' => 100 + rand(1,100),
                'expired_date' => date('Y-m-d h:i:s')
            ]);
        }
    }
}
