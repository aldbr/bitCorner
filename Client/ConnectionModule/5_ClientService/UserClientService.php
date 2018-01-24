<?php

/**
 * This class contains all methods which call the server to manipulate users
 */
class UserClientService {

  // -------------------- Setters --------------------------------

  public function createUser($userDTO){
    $userService = new UserService();
    $params = json_encode(UserClientFactory::DTOToJson($userDTO));    
    $json = BitCornerWebService::callMethod('createUser',$params);

  }

  public function deleteUser($id) {
    $userService = new UserService();
    $params = json_encode(['id' => $id]);   
    $json = BitCornerWebService::callMethod('deleteUser',$params);
  }

  // -------------------- Getters --------------------------------

  public function getUser($id) {
  	$userService = new UserService();
    $params = json_encode(['id' => $id]);
    
    $json = BitCornerWebService::callMethod('getUser',$params);

    $jsonArray = json_decode($json, true);
    return UserClientFactory::JsonToDTO($jsonArray);
  }

  public function getUsers() {
  	$userService = new UserService();

    $json = BitCornerWebService::callMethod('getUsers');
   
    $jsonArray = json_decode($json, true);
    return UserClientFactory::JsonArrayToDTOArray($jsonArray);
  }

  public function connect($username, $password) {
    $userService = new UserService();
    $params = json_encode(['username' => $username, 'password' => $password]);
    
    $json = BitCornerWebService::callMethod('connect',$params);
    
    $jsonArray = json_decode($json, true);
    
    if(isset($jsonArray['isConnected']))
    {      
      return $jsonArray['isConnected'];
    }

    return false;
  }

}

?>
