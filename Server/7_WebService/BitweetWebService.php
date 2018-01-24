<?php

class BitweetWebService
{
	public static function createBitweet($params)
	{
		$bitweetService = new BitweetService();
		$jsonDecoded = json_decode($params, true);
		$bitweetDTO = BitweetServerFactory::JsonToDTO($jsonDecoded);

		if($bitweetDTO != NULL)
		{
			$bitweetService->createBitweet($bitweetDTO);
		}
		else
		{
			throw new Exception("Create bitweet did not work");
		}
	}

	public static function deleteBitweet($params)
	{
		$bitweetService = new BitweetService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$bitweetDTO = $bitweetService->deleteBitweet($jsonDecoded['id']);
		}
		else
		{
			throw new Exception("Delete bitweet did not work");
		}
	}

	public static function getBitweet($params)
	{
		$bitweetService = new BitweetService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$bitweetDTO = $bitweetService->getBitweet($jsonDecoded['id']);
			$bitweetJSON = BitweetServerFactory::DTOToJSON($bitweetDTO);
			return json_encode($bitweetJSON);
		}
		else
		{
			return json_encode(NULL);
		}
	}

	public static function getBitweets()
	{
		$bitweetService = new BitweetService();
		$bitweetDTOs = $bitweetService->getBitweets();
		$jsonArray = BitweetServerFactory::DTOArrayToJsonArray($bitweetDTOs);
		return json_encode($jsonArray);
	}

  public static function getBitweetsFromUser($params)
	{
		$bitweetService = new BitweetService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['idUser']))
		{
			$bitweetDTOs = $bitweetService->getBitweetsFromUser($jsonDecoded['idUser']);
			$jsonArray = BitweetServerFactory::DTOArrayToJsonArray($bitweetDTOs);
			return json_encode($jsonArray);
		}
		else
		{
			return json_encode(NULL);
		}
	}

  public static function getBitweetsFromChannel($params)
	{
		$bitweetService = new BitweetService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['idChannel']))
		{
			$bitweetDTOs = $bitweetService->getBitweetsFromChannel($jsonDecoded['idChannel']);
			$jsonArray = BitweetServerFactory::DTOArrayToJsonArray($bitweetDTOs);
			return json_encode($jsonArray);
		}
		else
		{
			return json_encode(NULL);
		}
	}

}




?>
