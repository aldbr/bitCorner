<?php

/**
 * Small example of controller which manipulate user model
 */
class UserController {

  public function createUser($userModel) {
    $userClientService = new UserClientService();
    $userDTO = UserClientFactory::ModelToDTO($userModel);
    $userClientService->createUser($userDTO);
  }
}

//Simulate a call from a view
$userControllerTest = new UserController();
$userModel = new UserModel("Username111","Password222","mail@lol.fr333");
$userControllerTest->createUser($userModel);

?>
