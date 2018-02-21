<?php

/**
 * Comment class: represents a comment of a bitweet
 */
class CommentServerFactory {

  public static function DTOToEntity($dto) {
  	return new CommentEntity(
      $dto->getId(),
  		$dto->getMessage(),
  		$dto->getNbVotes(),
      $dto->getBitweetId(),
  		$dto->getUserId(),
      $dto->getUsername()
  	);
  }

  public static function EntityToDTO($entity) {
  	return new CommentDTO(
      $entity->getId(),
  		$entity->getMessage(),
  		$entity->getNbVotes(),
      $entity->getBitweetId(),
  		$entity->getUserId(),
      $entity->getUsername()
  	);
  }

  public static function DTOToJson($dto) {
    return [
            'id' => $dto->getId(),
            'message' => $dto->getMessage(),
            'nbVotes' => $dto->getNbVotes(),
            'bitweetId' => $dto->getBitweetId(),
            'userId' => $dto->getUserId(),
            'username' => $dto->getUsername()
          ];
  }

  public static function JsonToDTO($json) {
    return new CommentDTO(
      $json['id'],
      $json['message'],
      $json['nbVotes'],
      $json['bitweetId'],
      $json['userId'],
      $json['username']);
  }

  public static function DTOArrayToJsonArray($dtoArray) {
    $jsonArray = array();

    foreach($dtoArray as $dto)
    {
      array_push($jsonArray, CommentServerFactory::DTOToJson($dto));
    }

    return $jsonArray;
  }

}

?>
