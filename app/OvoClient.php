<?php

namespace App;

use GuzzleHttp\Client;

class OvoClient
{
	protected $client;

	public function __construct()
	{
		$this->client = new Client([
            'base_uri' => 'https://api.gatewize.com',
			// 'timeout' => 2.0
		]);
	}

	public function pulsaProducts($license, $oprName)
	{
		$response = $this->client->get('/devel-ovo/product/'.$license.'/pulsa/'.$oprName);
		return json_decode($response->getBody(), true);
	}

	public function bankProducts($license)
	{
		$response = $this->client->get('/devel-ovo/product/'.$license.'/bank');
		return json_decode($response->getBody(), true);
	}

	public function getGroups($license)
	{
		$response = $this->client->get('/devel-ovo/group/'.$license.'/list');
		$response = json_decode($response->getBody(), true);

		if(isset($response['status'])){
			$response = [];
		}

		return $response;
    }

    public function getStats($license)
    {
        $response = $this->client->get('/devel-ovo/stats/'.$license.'/all');
        $response = json_decode($response->getBody(), true);

        return $response;
    }

	public function addGroup($license, $groupName, $groupLimit)
	{
		$response = $this->client->post("devel-ovo/group/" . $license . "/add",
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
		$response = $this->client->post("devel-ovo/group/" . $license . "/$id/update",
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
		$response = $this->client->get("devel-ovo/group/" . $license . "/$id/delete");
		return json_decode($response->getBody(), true);
	}

	public function addAccount($license, $defaultGroup, $phone)
	{
		$response = $this->client->get("devel-ovo/account/" . $license . "/$defaultGroup/$phone/add/years");
		return json_decode($response->getBody(),TRUE);
	}

	public function moveAccount($license, $oldGroup, $phone, $newGroup)
	{
		$response = $this->client->post("devel-ovo/account/" . $license . "/$oldGroup/$phone/move/$newGroup");
		return json_decode($response->getBody(), TRUE);
	}

	public function getAccounts($license)
	{
		$response = $this->client->get("devel-ovo/user/" . $license . "/list");
		return json_decode($response->getBody(),TRUE);
	}

	public function getAccountByGroup($license, $groupId)
	{
		$response = $this->client->get("devel-ovo/group/" . $license . "/$groupId/list");
		return json_decode($response->getBody(),TRUE);
	}
}
