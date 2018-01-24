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

  public function connect($username, $password)
  {
    $userClientService = new UserClientService();
    return $userClientService->connect($username, $password);
  }
}

//Simulate a call from a view
$userControllerTest = new UserController();

// ------------------------------------------------------------------------------- CREATE

//$userModel1 = new UserModel("Username111","Password111","mail@lol.fr111");
// $dto = UserClientFactory::ModelToDTO($userModel1);
// $json = UserClientFactory::DTOToJSON($dto);
// $encoded = json_encode($json);
// $decoded = json_decode($encoded, true);
// $jsonDecoded = UserClientFactory::JSONToDTO($decoded);
// var_dump($json);
// var_dump($encoded);
// var_dump($decoded);
// var_dump($jsonDecoded);
//$userModel2 = new UserModel("Username222","Password222","mail@lol.fr222");
//$userModel3 = new UserModel("Username333","Password333","mail@lol.fr333");
//$userControllerTest->createUser($userModel1);
//$userControllerTest->createUser($userModel2);
//$userControllerTest->createUser($userModel3);

// ------------------------------------------------------------------------------- GET ONE
//$user = $userControllerTest->getUser(435);
//$user = $userControllerTest->getUser(12);
//var_dump($user);
//echo $user->getId() .'\n';
//echo $user->getUsername() .'\n';
//echo $user->getPassword() .'\n';
//echo $user->getNbFollowers() .'\n';
//echo $user->getNbFollowing();

// ------------------------------------------------------------------------------- GET ALL

// $result = $userControllerTest->getUsers();

// echo 'There are '.count($result).' users<br/>';

// if(is_array($result)) {
// 	foreach($result as $user) {
//     echo '<pre>' . var_dump($user) . '</pre>';
// 		//echo $user->getId().' - '.$user->getUsername().'<br/>';
// 	}
// }


// ------------------------------------------------------------------------------- CHECK CONNEXION
// $existingUser = $userControllerTest->connect("Username111", "Password111");
// $nonExistingUser = $userControllerTest->connect("Username111", "Password222");

// var_dump($existingUser);
// var_dump($nonExistingUser);
?>
