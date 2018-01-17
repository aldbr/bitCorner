<?php

/**
 * This class contains all methods which call the server to manipulate channels
 */
class ChannelClientService {

  // -------------------- Setters --------------------------------

  public function createChannel($channelDTO){
    $channelService = new ChannelService();
    $channelService->createChannel($channelDTO);
  }

  public function deleteChannel($id) {
    $channelService = new ChannelService();
    $channelService->deleteChannel($id);
  }

  // -------------------- Setters --------------------------------

  public function getChannel($id) {
  	$channelService = new ChannelService();
    return $channelService->getChannel($id);
  }

  public function getChannels() {
  	$channelService = new ChannelService();
    return $channelService->getChannels();
  }
}

?>
