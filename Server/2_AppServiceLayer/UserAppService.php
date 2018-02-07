<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class UserAppService {

  // -------------------- Attributes ------------------------------

  private $userPersistence;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->userPersistence = new UserPersistence();
  }

  // -------------------- Setters --------------------------------

  public function createUser($userDTO){
  	$userEntity = UserServerFactory::DTOToEntity($userDTO);
  	$this->userPersistence->createUser($userEntity);
  }

  public function deleteUser($id){
  	$this->userPersistence->deleteUser($id);
  }

  // -------------------- Getters --------------------------------

  public function getUser($id) {
  	$userEntity = $this->userPersistence->getUser($id);
    return UserServerFactory::EntityToDTO($userEntity);
  }

  public function getUsers() {
  	$userEntities = $this->userPersistence->getUsers();
  	$userDTOs = array();

  	if(is_array($userEntities)) {
	   foreach($userEntities as $user) {
	      array_push($userDTOs, UserServerFactory::EntityToDTO($user));
	    }
	  }	
	  return $userDTOs;
  }

  public function connect($username, $password) {
    return $this->userPersistence->connect($username, $password);
	}
}

?>
