<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class UserService {

  public function createUser($userDTO){
    $userAppService = new UserAppService();
    $userAppService->createUser($userDTO);
  }
}

?>
