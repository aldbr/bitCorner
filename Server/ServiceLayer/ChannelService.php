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

  // -------------------- Getters --------------------------------

  public function getChannel($id) {
  	$channelAppService = new ChannelAppService();
    return $channelAppService->getChannel($id);
  }

  public function getChannels() {
  	$channelAppService = new ChannelAppService();
    return $channelAppService->getChannels();
  }
}

?>
