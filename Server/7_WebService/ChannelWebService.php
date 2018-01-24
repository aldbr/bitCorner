<?php

class ChannelWebService
{
	public static function createChannel($params)
	{
		$channelService = new ChannelService();
		$jsonDecoded = json_decode($params, true);
		$channelDTO = ChannelServerFactory::JsonToDTO($jsonDecoded);

		if($channelDTO != NULL)
		{
			$channelService->createChannel($channelDTO);
		}
		else
		{
			throw new Exception("Create channel did not work");
		}
	}

	public static function deleteChannel($params)
	{
		$channelService = new ChannelService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$channelDTO = $channelService->deleteChannel($jsonDecoded['id']);
		}
		else
		{
			throw new Exception("Delete channel did not work");
		}
	}

	public static function getChannel($params)
	{
		$channelService = new ChannelService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$channelDTO = $channelService->getChannel($jsonDecoded['id']);
			$channelJSON = ChannelServerFactory::DTOToJSON($channelDTO);
			return json_encode($channelJSON);
		}
		else
		{
			return json_encode(NULL);
		}
	}

	public static function getChannels()
	{
		$channelService = new ChannelService();
		$channelDTOs = $channelService->getChannels();
		$jsonArray = ChannelServerFactory::DTOArrayToJsonArray($channelDTOs);
		return json_encode($jsonArray);
	}

}




?>
