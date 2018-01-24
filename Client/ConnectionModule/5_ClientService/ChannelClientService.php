<?php

/**
 * This class contains all methods which call the server to manipulate channels
 */
class ChannelClientService {

  // -------------------- Setters --------------------------------

  public function createChannel($channelDTO){
    $channelService = new ChannelService();
    $params = json_encode(ChannelClientFactory::DTOToJson($bitweetDTO));
    $json = BitCornerWebService::callMethod('createChannel',$params);
  }

  public function deleteChannel($id) {
    $channelService = new ChannelService();
    $params = json_encode(['id' => $id]);
    $json = BitCornerWebService::callMethod('deleteChannel',$params);
  }

  // -------------------- Setters --------------------------------

  public function getChannel($id) {
  	$channelService = new ChannelService();
    $params = json_encode(['id' => $id]);

    $json = BitCornerWebService::callMethod('getChannel',$params);

    $jsonArray = json_decode($json, true);
    return ChannelClientFactory::JsonToDTO($jsonArray);
  }

  public function getChannels() {
  	$channelService = new ChannelService();
    $json = BitCornerWebService::callMethod('getChannels');

    $jsonArray = json_decode($json, true);
    return ChannelClientFactory::JsonArrayToDTOArray($jsonArray);
  }
}

?>
