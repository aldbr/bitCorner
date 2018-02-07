<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class BitweetAppService {

  // -------------------- Attributes ------------------------------

  private $bitweetPersistence;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->bitweetPersistence = new BitweetPersistence();
  }

  // -------------------- Setters --------------------------------

  public function createBitweet($bitweetDTO){
  	$bitweetEntity = BitweetServerFactory::DTOToEntity($bitweetDTO);
  	$this->bitweetPersistence->createBitweet($bitweetEntity);
  }

  public function deleteBitweet($id){
  	$this->bitweetPersistence->deleteBitweet($id);
  }

  // -------------------- Getters --------------------------------

  public function getBitweet($id) {
  	$bitweetEntity = $this->bitweetPersistence->getBitweet($id);
    return BitweetServerFactory::EntityToDTO($bitweetEntity);
  }

  public function getBitweets() {
  	$bitweetEntities = $this->bitweetPersistence->getBitweets();
  	$bitweetDTOs = array();

  	if(is_array($bitweetEntities)) {
	  foreach($bitweetEntities as $bitweet) {
	    array_push($bitweetDTOs, BitweetServerFactory::EntityToDTO($bitweet));
	  }
	}
	return $bitweetDTOs;
  }

  public function getBitweetsFromUser($idUser) {
  	$bitweetEntities = $this->bitweetPersistence->getBitweetsFromUser($idUser);
  	$bitweetDTOs = array();

  	if(is_array($bitweetEntities)) {
	  foreach($bitweetEntities as $bitweet) {
	    array_push($bitweetDTOs, BitweetServerFactory::EntityToDTO($bitweet));
	  }
	}
	return $bitweetDTOs;
  }

  public function getBitweetsFromChannel($idChannel) {
  	$bitweetEntities = $this->bitweetPersistence->getBitweetsFromChannel($idChannel);
  	$bitweetDTOs = array();

  	if(is_array($bitweetEntities)) {
	  foreach($bitweetEntities as $bitweet) {
	    array_push($bitweetDTOs, BitweetServerFactory::EntityToDTO($bitweet));
	  }
	}
	return $bitweetDTOs;
  }
}

?>
