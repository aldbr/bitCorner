<?php

/**
 * This class contains all methods which call the server to manipulate users 
 */
class UserClientService {

  public function createUser($userDTO){
    $userService = new UserService();
    $userService->createUser($userDTO);
  }
}

?>
