<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class ChannelService {

  // -------------------- Attributes ------------------------------

  private $channelAppService;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->$channelAppService = new ChannelAppService();
  }

  // -------------------- Setters --------------------------------

  public function createChannel($channelDTO){
    $this->$channelAppService->createChannel($channelDTO);
  }

  public function deleteChannel($id) {
    $this->$channelAppService->deleteChannel($id);
  }

  // -------------------- Getters --------------------------------

  public function getChannel($id) {
    return $this->$channelAppService->getChannel($id);
  }

  public function getChannels() {
    return $this->$channelAppService->getChannels();
  }
}

?>
