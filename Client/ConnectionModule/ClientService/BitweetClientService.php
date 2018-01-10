<?php

/**
 * This class contains all methods which call the server to manipulate bitweets
 */
class BitweetClientService {

  public function createBitweet($bitweetDTO){
    $bitweetService = new BitweetService();
    $bitweetService->createBitweet($bitweetDTO);
  }
}

?>
