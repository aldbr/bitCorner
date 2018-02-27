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
					return BitweetWebService::getBitweet($params);
					break;
				case "getBitweets":
					return BitweetWebService::getBitweets();
					break;
				case "getBitweetsFromUser":
					return BitweetWebService::getBitweetsFromUser($params);
					break;
				case "getBitweetsFromChannel":
					return BitweetWebService::getBitweetsFromChannel($params);
					break;
				case "upVote":
					BitweetWebService::upVote($params);
					break;
				case "downVote":
					BitweetWebService::downVote($params);
					break;

				case "createChannel":
					ChannelWebService::createChannel($params);
					break;
				case "getChannel":
					return ChannelWebService::getChannel($params);
					break;
				case "getChannels":
					return ChannelWebService::getChannels();
					break;

				case "createComment":
					CommentWebService::createComment($params);
					break;
				case "deleteComment":
					CommentWebService::deleteComment($params);
					break;
				case "getComment":
					return CommentWebService::getComment($params);
					break;
				case "getComments":
					return CommentWebService::getComments($params);
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
}

?>
