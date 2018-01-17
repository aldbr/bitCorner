<?php

/**
 * Bitweet class: represents a post typeset by a user
 */
class BitweetServerFactory {

  public static function DTOToEntity($dto) {
  	return new BitweetEntity(
      $dto->getId(),
      $dto->getMessage(),
      $dto->getNbVotes(),
      $dto->getComments()
  	);
  }

  public static function EntityToDTO($entity) {
  	return new BitweetDTO(
      $entity->getId(),
      $entity->getMessage(),
      $entity->getNbVotes(),
      $entity->getComments()
  	);
  }
}

?>
