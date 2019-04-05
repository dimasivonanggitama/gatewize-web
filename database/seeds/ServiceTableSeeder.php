<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
        	'name' => 'gojek',
        	'url' => 'http://api.gatewize.com/devel-gojek',
        	'settings' => '{"limit_token":5,"limit_pulsa":5,"limit_transfer":9999}'
        ]);
        Service::create([
        	'name' => 'ovo',
        	'url' => 'http://api.gatewize.com/devel-ovo',
        	'settings' => '{"limit_bulk":9999,"limit_mkios":9999,"limit_voucher":9999}'
        ]);
        Service::create([
        	'name' => 'digipos',
        	'url' => 'http://api.gatewize.com/devel-digipos',
        	'settings' => '{"limit_tf_ovo":9999,"limit_tf_bank":9999,"limit_pulsa":9999,"limit_token":9999}'
        ]);
    }
}
