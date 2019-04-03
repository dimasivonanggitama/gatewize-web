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

	public function subscribe($userId, $license, $accountLimit, $settings, $callbackUrl = null)
	{
		$response = $this->client->post('/devel-gopay/user/'.$license.'/'.$userId. '/subscribe', [
			'json' => [
				"account_limit" => (int)$accountLimit,
				"settings" => json_decode($settings, true),
				"callback_url" => $callbackUrl
			]
		]);
		return json_decode($response->getBody(), true);
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
		$response = json_decode($response->getBody(), true);

		if(isset($response['status'])){
			$response = [];
		}
		
		return $response;
	}

	public function addGroup($license, $groupName, $groupLimit)
	{
		$response = $this->client->post("devel-gopay/group/" . $license . "/add", 
			[
				'json' => [
					'name' => $groupName,
					'limit' => (int)$groupLimit
				]
			]);
		return json_decode($response->getBody(), true);
	}

	public function updateGroup($license, $id, $groupName, $groupLimit)
	{
		$response = $this->client->post("devel-gopay/group/" . $license . "/$id/update", 
			[
				'json' => [
					'name' => $groupName,
					'limit' => (int)$groupLimit
				]
			]);
		return json_decode($response->getBody(), true);
	}

	public function deleteGroup($license, $id)
	{
		$response = $this->client->get("devel-gopay/group/" . $license . "/$id/delete");
		return json_decode($response->getBody(), true);
	}

	public function addAccount($license, $defaultGroup, $phone)
	{
		$response = $this->client->get("devel-gopay/account/" . $license . "/$defaultGroup/$phone/add/years");
		return json_decode($response->getBody(),TRUE);
	}

	public function moveAccount($license, $oldGroup, $phone, $newGroup)
	{
		$response = $this->client->post("devel-gopay/account/" . $license . "/$oldGroup/$phone/move/$newGroup");
		return json_decode($response->getBody(), TRUE);
	}

	public function getAccounts($license)
	{
		$response = $this->client->get("devel-gopay/user/" . $license . "/list");
		return json_decode($response->getBody(),TRUE);
	}

	public function getAccountByGroup($license, $groupId)
	{
		$response = $this->client->get("devel-gopay/group/" . $license . "/$groupId/list");
		return json_decode($response->getBody(),TRUE);
	}
}