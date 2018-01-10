<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class UserAppService {

  public function createUser($userDTO){
  	$userEntity = UserServerFactory::DTOToEntity($userDTO);
  	$userPersistence = new UserPersistence();
  	$userPersistence->createUser($userEntity);
  }
}

?>
