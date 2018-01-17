<?php

/**
 * Small example of controller which manipulate bitweet model
 */
class BitweetController {

  // -------------------- Setters --------------------------------

  public function createBitweet($bitweetModel) {
    $bitweetClientService = new BitweetClientService();
    $bitweetDTO = BitweetClientFactory::ModelToDTO($bitweetModel);
    $bitweetClientService->createBitweet($bitweetDTO);
  }

  // -------------------- Getters --------------------------------

  public function getBitweet($id) {
  	$bitweetClientService = new BitweetClientService();
  	$bitweetDTO = $bitweetClientService->getBitweet($id);
    return BitweetClientFactory::DTOToModel($bitweetDTO);
  }

  public function getBitweets() {
  	$bitweetClientService = new BitweetClientService();
  	$bitweetDTOs = $bitweetClientService->getBitweets();
  	$bitweetModels = array();

    if(is_array($bitweetDTOs)) {
  	  foreach($bitweetDTOs as $bitweet) {
  	    array_push($bitweetModels, BitweetClientFactory::DTOToModel($bitweet));
      }
    }

    return $bitweetModels;
  }

  public function getBitweetsFromUser($idUser) {
    $bitweetClientService = new BitweetClientService();
  	$bitweetDTOs = $bitweetClientService->getBitweetsFromUser($idUser);
  	$bitweetModels = array();

    if(is_array($bitweetDTOs)) {
  	  foreach($bitweetDTOs as $bitweet) {
  	    array_push($bitweetModels, BitweetClientFactory::DTOToModel($bitweet));
      }
    }

    return $bitweetModels;
  }

  public function getBitweetsFromChannel($idChannel) {
    $bitweetClientService = new BitweetClientService();
  	$bitweetDTOs = $bitweetClientService->getBitweetsFromChannel($idChannel);
  	$bitweetModels = array();

    if(is_array($bitweetDTOs)) {
  	  foreach($bitweetDTOs as $bitweet) {
  	    array_push($bitweetModels, BitweetClientFactory::DTOToModel($bitweet));
      }
    }

    return $bitweetModels;
  }
}

//Simulate a call from a view
$bitweetControllerTest = new BitweetController();
$bitModel1 = new BitweetModel("bit1", 435, 437);
$bitModel2 = new BitweetModel("bit2", 435, 437);
$bitModel3 = new BitweetModel("bit3", 435, 437);
//$bitweetControllerTest->createBitweet($bitModel1);
//$bitweetControllerTest->createBitweet($bitModel2);
//$bitweetControllerTest->createBitweet($bitModel3);

$result = $bitweetControllerTest->getBitweets();
echo 'There are '.count($result).' bitweets<br/>';

if(is_array($result)) {
	foreach($result as $bitw) {
    echo '<pre>' . var_dump($bitw) . '</pre>';
		//echo $user->getId().' - '.$user->getUsername().'<br/>';
	}
}

//$result = $bitweetControllerTest->getBitweet(621);
//echo '<pre>' . var_dump($result) . '</pre>';

//$result = $bitweetControllerTest->getBitweetsFromUser(435);
//echo '<pre>' . var_dump($result) . '</pre>';

//$result = $bitweetControllerTest->getBitweetsFromChannel(543);
//echo '<pre>' . var_dump($result) . '</pre>';
?>
