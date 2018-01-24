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
  		$dto->getUserId()
  	);
  }

  public static function EntityToDTO($entity) {
  	return new CommentDTO(
      $entity->getId(),
  		$entity->getMessage(),
  		$entity->getNbVotes(),
      $entity->getBitweetId(),
  		$entity->getUserId()
  	);
  }

  public static function DTOToJson($dto) {
    return [
            'id' => $dto->getId(),
            'message' => $dto->getMessage(),
            'nbVotes' => $dto->getNbVotes(),
            'bitweetId' => $dto->getBitweetId(),
            'userId' => $dto->getUserId()
          ];
  }

  public static function JsonToDTO($json) {
    return new CommentDTO(
      $json['id'],
      $json['message'],
      $json['nbVotes'],
      $json['bitweetId'],
      $json['userId']);
  }

}

?>
