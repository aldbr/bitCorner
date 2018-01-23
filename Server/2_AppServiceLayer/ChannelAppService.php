<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class ChannelAppService {

  // -------------------- Setters --------------------------------

  public function createChannel($channelDTO){
  	$channelEntity = ChannelServerFactory::DTOToEntity($channelDTO);
  	$channelPersistence = new ChannelPersistence();
  	$channelPersistence->createChannel($channelEntity);
  }

  public function deleteChannel($id){
  	$channelPersistence = new ChannelPersistence();
  	$channelPersistence->deleteChannel($id);
  }

  // -------------------- Getters --------------------------------

  public function getChannel($id) {
  	$channelPersistence = new ChannelPersistence();
  	$channelEntity = $channelPersistence->getChannel($id);
    return ChannelServerFactory::EntityToDTO($channelEntity);
  }

  public function getChannels() {
  	$channelPersistence = new ChannelPersistence();
  	$channelEntities = $channelPersistence->getChannels();
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
