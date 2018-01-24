<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class UserAppService {

  // -------------------- Setters --------------------------------

  public function createUser($userDTO){
  	$userEntity = UserServerFactory::DTOToEntity($userDTO);
  	$userPersistence = new UserPersistence();
  	$userPersistence->createUser($userEntity);
  }

  public function deleteUser($id){
  	$userPersistence = new UserPersistence();
  	$userPersistence->deleteUser($id);
  }

  // -------------------- Getters --------------------------------

  public function getUser($id) {
  	$userPersistence = new UserPersistence();
  	$userEntity = $userPersistence->getUser($id);
    return UserServerFactory::EntityToDTO($userEntity);
  }

  public function getUsers() {
  	$userPersistence = new UserPersistence();
  	$userEntities = $userPersistence->getUsers();
  	$userDTOs = array();

  	if(is_array($userEntities)) {
	   foreach($userEntities as $user) {
	      array_push($userDTOs, UserServerFactory::EntityToDTO($user));
	    }
	  }	
	  return $userDTOs;
  }

  public function connect($username, $password) {
    $userPersistence = new UserPersistence();
    return $userPersistence->connect($username, $password);
	}
}

?>
