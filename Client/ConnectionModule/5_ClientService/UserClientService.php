<?php

/**
 * This class contains all methods which call the server to manipulate users
 */
class UserClientService {

  // -------------------- Setters --------------------------------

  public function createUser($userDTO){
    $userService = new UserService();
    $userService->createUser($userDTO);
  }

  public function deleteBitweet($id) {
    $userService = new UserService();
    $userService->deleteUser($id);
  }

  // -------------------- Getters --------------------------------

  public function getUser($id) {
  	$userService = new UserService();
    return $userService->getUser($id);
  }

  public function getUsers() {
  	$userService = new UserService();
    return $userService->getUsers();
  }

}

?>
