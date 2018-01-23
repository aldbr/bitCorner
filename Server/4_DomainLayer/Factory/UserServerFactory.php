<?php

/**
 * Factory to convert User to DTO or Entity
 */
class UserServerFactory {

  public static function DTOToEntity($dto) {
  	return new UserEntity(
      $dto->getId(),
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
      $entity->getId(),
  		$entity->getUsername(),
  		$entity->getPassword(),
  		$entity->getMail(),
  		$entity->getNbFollowers(),
  		$entity->getNbFollowing(),
  		$entity->getBitweets()
  	);
  }

  public static function DTOToJson($dto) {
    return ['id' => $dto->getId(),
            'username' => $dto->getUsername(),
            'password' => $dto->getPassword(),
            'mail' => $dto->getMail(),
            'nbFollowers' => $dto->getNbFollowers(),
            'nbFollowing' => $dto->getNbFollowing(),
            'bitweets' => $dto->getBitweets()];
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


}

?>
