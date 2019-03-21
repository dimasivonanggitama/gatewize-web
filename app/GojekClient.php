<?php 

namespace App;

use GuzzleHttp\Client;

class GojekClient 
{
	protected $client;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'https://api.gatewize.com',
			// 'timeout' => 2.0
		]);
	}

	public function pulsaProducts($license, $phoneNumber)
	{
		$response = $this->client->get('/devel-gopay/product/'.$license.'/pulsa/'.$phoneNumber);
		return json_decode($response->getBody(), true);
	}

	public function tokenProducts($license)
	{
		$response = $this->client->get('/devel-gopay/product/'.$license.'/token');
		return json_decode($response->getBody(), true);
	}

	public function getGroups($license)
	{
		$response = $this->client->get('devel-gopay/group/'.$license.'/list');
		return json_decode($response->getBody(), true);
	}
}