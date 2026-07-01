<?php

namespace App\Http\Services;

use GuzzleHttp\Client;


use App\Interfaces\ModuleInterface as ModuleInterface;

class ModuleService implements ModuleInterface
{


	protected $clients;


	public function __construct(Client $clients){ 

		$this->clients = $clients;
	}

	public function responseGet($segment,$api_key_factory,$website,$user_id,$software_id)
	{        

		$endpoint = env('APP_ENDPOINT_FACTORY').$segment.'?api_key='.$api_key_factory.'&website='.$website.'&user_id='.$user_id.'&software_id='.$software_id;        

		$response = $this->clients->request('GET', $endpoint);      

		return  $ms_contents = json_decode($response->getBody()->getContents());
	}

	public function responseGetPublic($segment,$model_name)
	{        

		$endpoint = env('APP_ENDPOINT_FACTORY').$segment.'/'.$model_name;        

		$response = $this->clients->request('GET', $endpoint);      

		return  $ms_contents = json_decode($response->getBody()->getContents());
	}

	public function responseGetAllPublic($segment)
	{        

		$endpoint = env('APP_ENDPOINT_FACTORY').$segment;        

		$response = $this->clients->request('GET', $endpoint);      

		return  $ms_contents = json_decode($response->getBody()->getContents());
	}

	public function responseGetByPlayerName($segment)
	{        

		$endpoint = env('APP_ENDPOINT_FACTORY').$segment;        

		$response = $this->clients->request('GET', $endpoint);      

		return  $ms_contents = json_decode($response->getBody()->getContents());
	}

	public function responsePost($segment,$api_key_factory,$website,$user_id,$software_id)
	{      

		// $endpoint = env('APP_ENDPOINT_FACTORY').'/api/modules/seo?api_key='.$api_key_factory.'&website='.$website.'&user_id='.$user_id.'&software_id='.$software_id;        

		// $response = $this->clients->request('GET', $endpoint);      

		// return  $ms_contents = json_decode($response->getBody()->getContents());
	}


}
