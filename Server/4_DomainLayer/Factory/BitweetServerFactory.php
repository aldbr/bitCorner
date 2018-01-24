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
      $dto->getComments(),
      $dto->getIdUser(),
      $dto->getIdChannel()
  	);
  }

  public static function EntityToDTO($entity) {
  	return new BitweetDTO(
      $entity->getId(),
      $entity->getMessage(),
      $entity->getNbVotes(),
      $entity->getComments(),
      $entity->getIdUser(),
      $entity->getIdChannel()
  	);
  }

  public static function DTOToJson($dto) {
    return ['id' => $dto->getId(),
            'message' => $dto->getMessage(),
            'nbVotes' => $dto->getNbVotes(),
            'comments' => $dto->getComments(),
            'idUser' => $dto->getIdUser(),
            'idChannel' => $dto->getIdChannel()];
  }

  public static function JsonToDTO($json) {
    return new BitweetDTO(
      $json['id'],
      $json['message'],
      $json['nbVotes'],
      $json['comments'],
      $json['idUser'],
      $json['idChannel']);
  }
}

?>
