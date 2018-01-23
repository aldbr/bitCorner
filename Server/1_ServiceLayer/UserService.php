<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class UserService {

  // -------------------- Setters --------------------------------

  public function createUser($userDTO){
    $userAppService = new UserAppService();
    $userAppService->createUser($userDTO);
  }

  public function deleteUser($id) {
    $userAppService = new UserAppService();
    $userAppService->deleteUser($id);
  }

  // -------------------- Getters --------------------------------

  public function getUser($id) {
  	$userAppService = new UserAppService();
    $jsonArray = UserServerFactory::DTOToJson($userAppService->getUser($id));
    return json_encode($jsonArray);
  }

  public function getUsers() {
  	$userAppService = new UserAppService();
    return $userAppService->getUsers();
  }

}

?>
