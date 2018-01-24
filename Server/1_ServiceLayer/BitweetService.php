<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class BitweetService {

  // -------------------- Attributes ------------------------------

  private $bitweetAppService;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->$bitweetAppService = new BitweetAppService();
  }

  // -------------------- Setters --------------------------------

  public function createBitweet($bitweetDTO) {
    $this->$bitweetAppService->createBitweet($bitweetDTO);
  }

  public function deleteBitweet($id) {
    $this->$bitweetAppService->deleteBitweet($id);
  }

  // -------------------- Getters --------------------------------

  public function getBitweet($id) {
    return $this->$bitweetAppService->getBitweet($id);
  }

  public function getBitweets() {
  	$bitweetAppService = new BitweetAppService();
    return $this->$bitweetAppService->getBitweets();
  }

  public function getBitweetsFromUser($idUser) {
  	$bitweetAppService = new BitweetAppService();
    return $this->$bitweetAppService->getBitweetsFromUser($idUser);
  }

  public function getBitweetsFromChannel($idChannel) {
  	$bitweetAppService = new BitweetAppService();
    return $this->$bitweetAppService->getBitweetsFromChannel($idChannel);
  }
}

?>
