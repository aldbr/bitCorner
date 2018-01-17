<?php

/**
 * Small example of controller which manipulate user model
 */
class UserController {

  // -------------------- Setters --------------------------------

  public function createUser($userModel) {
    $userClientService = new UserClientService();
    $userDTO = UserClientFactory::ModelToDTO($userModel);
    $userClientService->createUser($userDTO);
  }

  public function deleteUser($id) {
    $userClientService = new UserClientService();
    $userDTO = $userClientService->deleteUser($id);
  }

  // -------------------- Getters --------------------------------

  public function getUser($id) {
  	$userClientService = new UserClientService();
  	$userDTO = $userClientService->getUser($id);
    return UserClientFactory::DTOToModel($userDTO);

  }

  public function getUsers() {
  	$userClientService = new UserClientService();
  	$userDTOs = $userClientService->getUsers();
  	$userModels = array();

    if(is_array($userDTOs)) {
  	  foreach($userDTOs as $user) {
  	    array_push($userModels, UserClientFactory::DTOToModel($user));
  	  }
	}

	return $userModels;
  }

}

//Simulate a call from a view
$userControllerTest = new UserController();
$userModel1 = new UserModel("Username111","Password111","mail@lol.fr111");
$userModel2 = new UserModel("Username222","Password222","mail@lol.fr222");
$userModel3 = new UserModel("Username333","Password333","mail@lol.fr333");
//$userControllerTest->createUser($userModel1);
//$userControllerTest->createUser($userModel);
//$userControllerTest->createUser($userModel3);

$result = $userControllerTest->getUsers();

echo 'There are '.count($result).' users<br/>';

if(is_array($result)) {
	foreach($result as $user) {
    echo '<pre>' . var_dump($user) . '</pre>';
		//echo $user->getId().' - '.$user->getUsername().'<br/>';
	}
}

?>
