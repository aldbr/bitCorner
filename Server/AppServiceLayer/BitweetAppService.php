<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class BitweetAppService {

  public function createBitweet($bitweetDTO){
  	$bitweetEntity = BitweetServerFactory::DTOToEntity($bitweetDTO);
  	$bitweetPersistence = new BitweetPersistence();
  	$bitweetPersistence->createBitweet($bitweetEntity);
  }
}

?>
