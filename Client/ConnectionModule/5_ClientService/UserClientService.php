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
    $jsonArray = json_decode($userService->getUser($id), true);
    return UserClientFactory::JsonToDTO($jsonArray);
  }

  public function getUsers() {
  	$userService = new UserService();
    return $userService->getUsers();
  }

  public function connect($username, $password) {
    $userService = new UserService();
    return $userService->connect($username, $password);
  }

}

?>
