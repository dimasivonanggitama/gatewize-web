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

	public function subscribe($userId, $license, $accountLimit, $settings, $callbackUrl = null)
	{
		$response = $this->client->post('/devel-digipos/user/'.$license.'/'.$userId. '/subscribe', [
			'json' => [
				"account_limit" => (int)$accountLimit,
				"settings" => json_decode($settings, true),
				"callback_url" => $callbackUrl
			]
		]);
		return json_decode($response->getBody(), true);
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

	public function getGroups($license)
	{
		$response = $this->client->get('devel-digipos/group/'.$license.'/list');

		$response = json_decode($response->getBody(), true);
		if(isset($response['status']) && $response['status'] == false){
			$response = [];
		}
		return $response;
    }

    public function getStats($license)
    {
        $response = $this->client->get('/devel-digipos/stats/'.$license.'/all');
        $response = json_decode($response->getBody(), true);

        return $response;
    }

	public function getAccounts($license)
	{
		$response = $this->client->get('devel-digipos/user/'.$license.'/list');

		$response = json_decode($response->getBody(), true);
		if(isset($response['status']) && $response['status'] == false){
			$response = [];
		}
		return $response;
	}

	public function addAccount($license, $phone)
	{
		$response = $this->client->get("devel-digipos/account/" . $license . "/$phone/add/years");
		return json_decode($response->getBody(),TRUE);
	}
}
