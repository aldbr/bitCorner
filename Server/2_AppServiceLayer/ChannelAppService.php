<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class ChannelAppService {

  // -------------------- Attributes ------------------------------

  private $channelPersistence;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->channelPersistence = new ChannelPersistence();
  }
  
  // -------------------- Setters --------------------------------

  public function createChannel($channelDTO){
  	$channelEntity = ChannelServerFactory::DTOToEntity($channelDTO);
  	$this->channelPersistence->createChannel($channelEntity);
  }

  public function deleteChannel($id){
  	$this->channelPersistence->deleteChannel($id);
  }

  // -------------------- Getters --------------------------------

  public function getChannel($id) {
  	$channelEntity = $this->channelPersistence->getChannel($id);
    return ChannelServerFactory::EntityToDTO($channelEntity);
  }

  public function getChannels() {
  	$channelEntities = $this->channelPersistence->getChannels();
  	$channelDTOs = array();

  	if(is_array($channelEntities)) {
	  foreach($channelEntities as $channel) {
	    array_push($channelDTOs, ChannelServerFactory::EntityToDTO($channel));
	  }
	}
	return $channelDTOs;
  }
}

?>
