<?php

/**
 * Small example of controller which manipulates channel model
 */
class ChannelController {

  // -------------------- Setters --------------------------------

  public function createChannel($channelModel) {
    $channelClientService = new ChannelClientService();
    $channelDTO = ChannelClientFactory::ModelToDTO($channelModel);
    $channelClientService->createChannel($channelDTO);
  }

  public function deleteChannel($id) {
    $channelClientService = new ChannelClientService();
    $channelDTO = $channelClientService->deleteChannel($id);
  }

  // -------------------- Getters --------------------------------

  public function getChannel($id) {
  	$channelClientService = new ChannelClientService();
  	$channelDTO = $channelClientService->getChannel($id);
    return ChannelClientFactory::DTOToModel($channelDTO);
  }

  public function getChannels() {
  	$channelClientService = new ChannelClientService();
  	$channelDTOs = $channelClientService->getChannels();
  	$channelModels = array();

    if(is_array($channelDTOs)) {
  	  foreach($channelDTOs as $channel) {
  	    array_push($channelModels, ChannelClientFactory::DTOToModel($channel));
      }
    }

    return $channelModels;
  }
}

//Simulate a call from a view
$channelControllerTest = new ChannelController();

// ------------------------------------------------------------------------------- CREATE
//$channelModel1 = new ChannelModel("btc");
//$channelModel2 = new ChannelModel("eth");
//$channelModel3 = new ChannelModel("doge");
//$channelControllerTest->createChannel($channelModel1);
//$channelControllerTest->createChannel($channelModel2);
//$channelControllerTest->createChannel($channelModel3);

// ------------------------------------------------------------------------------- GET ONE
//$result = $channelControllerTest->getChannel(252);
//var_dump($result);

// ------------------------------------------------------------------------------- GET ALL
// $result = $channelControllerTest->getChannels();
// echo 'There are '.count($result).' channels<br/>';

// if(is_array($result)) {
// 	foreach($result as $channel) {
//    echo '<pre>' . var_dump($channel) . '</pre>';
// 	}
// }

?>
