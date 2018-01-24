<?php

class BitCornerWebService
{
	public static function callMethod($action, $params = NULL)
	{
		//if(isset($_REQUEST['action']))
		if(isset($action))
		{

			//if(isset($_REQUEST['params']))

			switch($action)
			{
				case "createBitweet":
					BitweetWebService::createBitweet($params);
					break;
				case "deleteBitweet":
					BitweetWebService::deleteBitweet($params);
					break;
				case "getBitweet":
					BitweetWebService::getBitweet($params);
					break;
				case "getBitweets":
					BitweetWebService::getBitweets();
					break;
				case "getBitweetsFromUser":
					BitweetWebService::getBitweetsFromUser($params);
					break;
				case "getBitweetsFromChannel":
					BitweetWebService::getBitweetsFromChannel($params);
					break;

				case "createChannel":
					ChannelWebService::createChannel($params);
					break;
				case "getChannel":
					ChannelWebService::getChannel($params);
					break;
				case "getChannels":
					ChannelWebService::getChannels();
					break;

				case "createComment":
					CommentWebService::createComment($params);
					break;
				case "deleteComment":
					CommentWebService::deleteComment($params);
					break;
				case "getComment":
					CommentWebService::getComment($params);
					break;
				case "getComments":
					CommentWebService::getComments($params);
					break;

				case "createUser":
					UserWebService::createUser($params);
					break;
				case "deleteUser":
					UserWebService::deleteUser($params);
					break;
				case "getUser":
					return UserWebService::getUser($params);
					break;
				case "getUsers":
					return UserWebService::getUsers();
					break;
				case "connect":
					return UserWebService::connect($params);
					break;
			}
		}
	}

	// ---------------------------------------------------------------------------- USER
	private static function createUser($params)
	{
		$userService = new UserService();
		$jsonDecoded = json_decode($params, true);
		$userDTO = UserServerFactory::JsonToDTO($jsonDecoded);

		if($userDTO != NULL)
		{
			$userService->createUser($userDTO);
		}
		else
		{
			throw new Exception("Create user did not work");
		}
	}

	private static function deleteUser($params)
	{
		$userService = new UserService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$userDTO = $userService->deleteUser($jsonDecoded['id']);
		}
		else
		{
			throw new Exception("Delete user did not work");
		}
	}

	private static function getUser($params)
	{
		$userService = new UserService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$userDTO = $userService->getUser($jsonDecoded['id']);
			$userJSON = UserServerFactory::DTOToJSON($userDTO);
			return json_encode($userJSON);
		}
		else
		{
			return json_encode(NULL);
		}
	}

	private static function getUsers()
	{
		$userService = new UserService();
		$userDTOs = $userService->getUsers();
		$jsonArray = UserServerFactory::DTOArrayToJsonArray($userDTOs);
		return json_encode($jsonArray);
	}

	private static function connect($params)
	{
		$userService = new UserService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['username']) && isset($jsonDecoded['password']))
		{
			$isConnected = $userService->connect($jsonDecoded['username'],$jsonDecoded['password']);
			$resultArray = ['isConnected' => $isConnected];
			return json_encode($resultArray);
		}
		else
		{
			return json_encode(['isConnected' => false]);
		}
	}
}

?>
