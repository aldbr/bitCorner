<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class ChannelService {

  // -------------------- Setters --------------------------------

  public function createChannel($channelDTO){
    $channelAppService = new ChannelAppService();
    $channelAppService->createChannel($channelDTO);
  }

  public function deleteChannel($id) {
    $channelAppService = new ChannelAppService();
    $channelAppService->deleteChannel($id);
  }

  // -------------------- Getters --------------------------------

  public function getChannel($id) {
  	$channelAppService = new ChannelAppService();
    $jsonArray = ChannelServerFactory::DTOToJson($channelAppService->getChannel($id));
    return json_encode($jsonArray);
  }

  public function getChannels() {
  	$channelAppService = new ChannelAppService();
    return $channelAppService->getChannels();
  }
}

?>
