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
}

?>
