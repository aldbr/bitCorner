<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class UserService {

  // -------------------- Attributes ------------------------------

  private $userAppService;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->$userAppService = new UserAppService();
  }

  // -------------------- Setters --------------------------------

  public function createUser($userDTO){
    $this->$userAppService->createUser($userDTO);
  }

  public function deleteUser($id) {
    $this->$userAppService->deleteUser($id);
  }

  // -------------------- Getters --------------------------------

  public function getUser($id) {
    return $this->$userAppService->getUser($id);
  }

  public function getUsers() {
    return $this->$userAppService->getUsers();
  }

  public function connect($username, $password) {
    return $this->$userAppService->connect($username, $password);
  }
  
}

?>
