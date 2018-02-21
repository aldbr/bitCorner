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
      $dto->getUsername(),
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
      $entity->getUsername(),
      $entity->getIdChannel()
  	);
  }

  public static function DTOToJson($dto) {
    return ['id' => $dto->getId(),
            'message' => $dto->getMessage(),
            'nbVotes' => $dto->getNbVotes(),
            'comments' => CommentServerFactory::DTOArrayToJsonArray($dto->getComments()),
            'idUser' => $dto->getIdUser(),
            'username' => $dto->getUsername(),
            'idChannel' => $dto->getIdChannel()];
  }

  public static function JsonToDTO($json) {
    return new BitweetDTO(
      $json['id'],
      $json['message'],
      $json['nbVotes'],
      $json['comments'],
      $json['idUser'],
      $json['username'],
      $json['idChannel']);
  }

  public static function DTOArrayToJsonArray($dtoArray) {
    $jsonArray = array();

    foreach($dtoArray as $dto)
    {
      array_push($jsonArray, BitweetServerFactory::DTOToJson($dto));
    }

    return $jsonArray;
  }
}

?>
