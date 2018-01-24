<?php

class UserWebService
{
	public static function createUser($params)
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

	public static function deleteUser($params)
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

	public static function getUser($params)
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

	public static function getUsers()
	{
		$userService = new UserService();
		$userDTOs = $userService->getUsers();
		$jsonArray = UserServerFactory::DTOArrayToJsonArray($userDTOs);
		return json_encode($jsonArray);
	}

	public static function connect($params)
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
			return ['isConnected' => false];
		}
	}
}




?>
