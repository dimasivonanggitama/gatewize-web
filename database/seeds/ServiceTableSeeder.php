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
        	'url' => '/',
        	'settings' => 'asdjasdjsad'
        ]);
        Service::create([
        	'name' => 'ovo',
        	'url' => '/',
        	'settings' => 'asdjasdjsad'
        ]);
        Service::create([
        	'name' => 'digipos',
        	'url' => '/',
        	'settings' => 'asdjasdjsad'
        ]);
    }
}
