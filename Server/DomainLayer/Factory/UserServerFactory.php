<?php

/**
 * Factory to convert User to DTO or Entity
 */
class UserServerFactory {

  public static function DTOToEntity($dto) {
  	return new UserEntity(
  		$dto->getUsername(),
  		$dto->getPassword(),
  		$dto->getMail(),
  		$dto->getNbFollowers(),
  		$dto->getNbFollowing(),
  		$dto->getBitweets()
  	);
  }

  public static function EntityToDTO($entity) {
  	return new UserDTO(
  		$entity->getUsername(),
  		$entity->getPassword(),
  		$entity->getMail(),
  		$entity->getNbFollowers(),
  		$entity->getNbFollowing(),
  		$entity->getBitweets()
  	);
  }
}

?>
