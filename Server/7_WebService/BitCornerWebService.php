<?php 

if(isset($_REQUEST['action']))
{
	$bitweetService = new BitweetService();
	$channelService = new ChannelService();
	$commentService = new CommentService();
	$userService = new UserService();

	$params = NULL;

	if(isset($_REQUEST['params']))
	{
		//TODO decode params json
		$params = $_REQUEST['params'];
	}

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
			$userService->createUser($userDTO);
			break;
		case "getUser":
			$userService->getUser($id);
			break;
		case "getUsers":
			$userService->getUsers();
			break;
		case "connect":
			$userService->connect($username, $password);
			break;
	}
}



?>