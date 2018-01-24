<?php

/**
 * User class: represents a user profile
 */
class UserClientFactory {

  public static function DTOToModel($dto) {
  	$userModel = new UserModel($dto->getUsername(), $dto->getPassword(), $dto->getMail());

    $userModel->setId($dto->getId());
    $userModel->setNbFollowers($dto->getNbFollowers());
    $userModel->setNbFollowing($dto->getNbFollowing());
    $userModel->setBitweets($dto->getBitweets());

    return $userModel;
  }

  public static function ModelToDTO($model) {
  	return new UserDTO(
      $model->getId(),
  		$model->getUsername(),
  		$model->getPassword(),
  		$model->getMail(),
  		$model->getNbFollowers(),
  		$model->getNbFollowing(),
  		$model->getBitweets()
  	);
  }

  public static function DTOToJson($dto) {
    return [
            'id' => $dto->getId(),
            'username' => $dto->getUsername(),
            'password' => $dto->getPassword(),
            'mail' => $dto->getMail(),
            'nbFollowers' => $dto->getNbFollowers(),
            'nbFollowing' => $dto->getNbFollowing(),
            'bitweets' => $dto->getBitweets()
          ];
  }

  public static function JsonToDTO($json) {
    return new UserDTO(
      $json['id'],
      $json['username'],
      $json['password'],
      $json['mail'],
      $json['nbFollowers'],
      $json['nbFollowing'],
      $json['bitweets']);
  }

  public static function JsonArrayToDTOArray($jsonArray)
  {
    $dtoArray = array();
    foreach($jsonArray as $jsonUser)
    {
      array_push($dtoArray,UserClientFactory::JsonToDTO($jsonUser));
    }
    return $dtoArray;
  }
}

?>
