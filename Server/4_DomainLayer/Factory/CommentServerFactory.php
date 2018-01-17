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
}

?>
