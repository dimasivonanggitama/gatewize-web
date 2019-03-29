<?php 

namespace App;

use GuzzleHttp\Client;

class DigiposClient 
{
	protected $client;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'https://api.gatewize.com',
			// 'timeout' => 2.0
		]);
	}

	public function voucherProducts($license)
	{
		$response = $this->client->get('/devel-digipos/product/'.$license.'/voucher');
		return json_decode($response->getBody(), true);
	}

    public function digitalProducts($license)
	{
		$response = $this->client->get('/devel-digipos/product/'.$license.'/digital');
		return json_decode($response->getBody(), true);
    }
    
    public function smsProducts($license)
	{
		$response = $this->client->get('/devel-digipos/product/'.$license.'/sms');
		return json_decode($response->getBody(), true);
    }
    
    public function bulkProducts($license)
	{
		$response = $this->client->get('/devel-digipos/product/'.$license.'/bulk');
		return json_decode($response->getBody(), true);
    }
    
    public function voiceProducts($license)
	{
		$response = $this->client->get('/devel-digipos/product/'.$license.'/voice');
		return json_decode($response->getBody(), true);
	}
}