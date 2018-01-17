<?php

/**
 * This class contains all methods which call the server to manipulate bitweets
 */
class BitweetClientService {

  // -------------------- Setters --------------------------------

  public function createBitweet($bitweetDTO){
    $bitweetService = new BitweetService();
    $bitweetService->createBitweet($bitweetDTO);
  }

  // -------------------- Setters --------------------------------

  public function getBitweet($id) {
  	$bitweetService = new BitweetService();
    return $bitweetService->getBitweet($id);
  }

  public function getBitweets() {
  	$bitweetService = new BitweetService();
    return $bitweetService->getBitweets();
  }

  public function getBitweetsFromUser($idUser) {
  	$bitweetService = new BitweetService();
    return $bitweetService->getBitweetsFromUser($idUser);
  }

  public function getBitweetsFromChannel($idChannel) {
  	$bitweetService = new BitweetService();
    return $bitweetService->getBitweetsFromChannel($idChannel);
  }
}

?>