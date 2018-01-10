<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class BitweetService {

  public function createBitweet($bitweetDTO){
    $bitweetAppService = new BitweetAppService();
    $bitweetAppService->createBitweet($bitweetDTO);
  }
}

?>
