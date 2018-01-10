<?php

/**
 * Small example of controller which manipulate bitweet model
 */
class BitweetController {

  public function createBitweet($bitweetModel) {
    $bitweetClientService = new BitweetClientService();
    $bitweetDTO = BitweetClientFactory::ModelToDTO($bitweetModel);
    $bitweetClientService->createBitweet($bitweetDTO);
  }
}

//Simulate a call from a view
$bitweetControllerTest = new BitweetController();
$bitweetModel = new BitweetModel("Montée en force du DOGE ! OMG !");
$bitweetControllerTest->createBitweet($bitweetModel);

?>
