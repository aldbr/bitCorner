<?php 

class BitCornerWebService
{
	public static function callMethod($action, $params = NULL)
	{
		//if(isset($_REQUEST['action']))
		if(isset($action))
		{
			$bitweetService = new BitweetService();
			$channelService = new ChannelService();
			$commentService = new CommentService();
			$userService = new UserService();

			//if(isset($_REQUEST['params']))

			switch($action)
			{
				case "createBitweet":
					$bitweetService->createBitweet($bitweetDTO);
					break;
				case "getBitweet":
					$bitweetService->getBitweet($id);
					break;
				case "getBitweets":
					$bitweetService->getBitweets();
					break;
				case "getBitweetsFromUser":
					$bitweetService->getBitweetsFromUser($idUser);
					break;
				case "getBitweetsFromChannel":
					$bitweetService->getBitweetsFromChannel($idChannel);
					break;

				case "createChannel":
					$channelService->createChannel($channelDTO);
					break;
				case "getChannel":
					$channelService->getChannel($id);
					break;
				case "getChannels":
					$channelService->getChannels();
					break;

				case "createComment":
					$commentService->createComment($commentDTO);
					break;
				case "getComment":
					$commentService->getComment($id);
					break;
				case "getComments":
					$commentService->getComments($userId = NULL);
					break;

				case "createUser":
					BitCornerWebService::createUser($params);
					break;
				case "deleteUser":
					BitCornerWebService::deleteUser($params);
					break;
				case "getUser":
					return BitCornerWebService::getUser($params);
					break;
				case "getUsers":
					return BitCornerWebService::getUsers();
					break;
				case "connect":
					return BitCornerWebService::connect($params);
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