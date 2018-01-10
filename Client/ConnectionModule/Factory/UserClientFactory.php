<?php

/**
 * User class: represents a user profile
 */
class UserClientFactory {

  public static function DTOToModel($dto) {
  	return new UserModel(
  		$dto->getUsername(),
  		$dto->getPassword(),
  		$dto->getMail(),
  		$dto->getNbFollowers(),
  		$dto->getNbFollowing(),
  		$dto->getBitweets()
  	);
  }

  public static function ModelToDTO($model) {
  	return new UserDTO(
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
