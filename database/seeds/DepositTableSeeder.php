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
            $amountList = [50000, 100000, 150000];
            $amount = $amountList[rand(0,2)];
            $statusList = ['WAITING', 'ACCEPTED', 'FAILED', 'CANCELED', 'EXPIRED'];

            $unique_code = rand(1,100);
            $total = $unique_code + $amount;
            Deposit::create([
                'user_id' => $value->id,
                'payment_method_id' => rand(1,2),
                'amount' => $amount,
                'balance' => $amount,
                'sender_name' => "Ganteng",
                'status' => $statusList[rand(0,4)],
                'unique_code' => $unique_code,
                'total' => $total,
                'expired_date' => date('Y-m-d h:i:s')
            ]);
        }
    }
}
