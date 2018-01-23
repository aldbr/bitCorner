<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class BitweetAppService {

  // -------------------- Setters --------------------------------

  public function createBitweet($bitweetDTO){
  	$bitweetEntity = BitweetServerFactory::DTOToEntity($bitweetDTO);
  	$bitweetPersistence = new BitweetPersistence();
  	$bitweetPersistence->createBitweet($bitweetEntity);
  }

  public function deleteBitweet($id){
  	$bitweetPersistence = new BitweetPersistence();
  	$bitweetPersistence->deleteBitweet($id);
  }

  // -------------------- Getters --------------------------------

  public function getBitweet($id) {
  	$bitweetPersistence = new BitweetPersistence();
  	$bitweetEntity = $bitweetPersistence->getBitweet($id);
    return BitweetServerFactory::EntityToDTO($bitweetEntity);
  }

  public function getBitweets() {
  	$bitweetPersistence = new BitweetPersistence();
  	$bitweetEntities = $bitweetPersistence->getBitweets();
  	$bitweetDTOs = array();

  	if(is_array($bitweetEntities)) {
	  foreach($bitweetEntities as $bitweet) {
	    array_push($bitweetDTOs, BitweetServerFactory::EntityToDTO($bitweet));
	  }
	}
	return $bitweetDTOs;
  }

  public function getBitweetsFromUser($idUser) {
  	$bitweetPersistence = new BitweetPersistence();
  	$bitweetEntities = $bitweetPersistence->getBitweetsFromUser($idUser);
  	$bitweetDTOs = array();

  	if(is_array($bitweetEntities)) {
	  foreach($bitweetEntities as $bitweet) {
	    array_push($bitweetDTOs, BitweetServerFactory::EntityToDTO($bitweet));
	  }
	}
	return $bitweetDTOs;
  }

  public function getBitweetsFromChannel($idChannel) {
  	$bitweetPersistence = new BitweetPersistence();
  	$bitweetEntities = $bitweetPersistence->getBitweetsFromChannel($idChannel);
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
