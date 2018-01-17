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
  	$bitweetDTO = $bitweetClientService->getbitweet($id);
    return BitweetClientFactory::DTOToModel($bitweetDTO);
  }

  public function getBitweets() {
  	$bitweetClientService = new BitweetClientService();
  	$bitweetDTOs = $bitweetClientService->getbitweets();
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
$bitModel1 = new BitweetModel("bit1");
$bitModel2 = new BitweetModel("bit2");
$bitModel3 = new BitweetModel("bit3");
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

?>
