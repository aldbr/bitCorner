<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class BitweetService {

  // -------------------- Setters --------------------------------

  public function createBitweet($bitweetDTO) {
    $bitweetAppService = new BitweetAppService();
    $bitweetAppService->createBitweet($bitweetDTO);
  }

  public function deleteBitweet($id) {
    $bitweetAppService = new BitweetAppService();
    $bitweetAppService->deleteBitweet($id);
  }

  // -------------------- Getters --------------------------------

  public function getBitweet($id) {
  	$bitweetAppService = new BitweetAppService();
    $jsonArray = BitweetServerFactory::DTOToJson($bitweetAppService->getBitweet($id));
    return json_encode($jsonArray);
  }

  public function getBitweets() {
  	$bitweetAppService = new BitweetAppService();
    return $bitweetAppService->getBitweets();
  }

  public function getBitweetsFromUser($idUser) {
  	$bitweetAppService = new BitweetAppService();
    return $bitweetAppService->getBitweetsFromUser($idUser);
  }

  public function getBitweetsFromChannel($idChannel) {
  	$bitweetAppService = new BitweetAppService();
    return $bitweetAppService->getBitweetsFromChannel($idChannel);
  }
}

?>
