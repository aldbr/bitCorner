<?php

/**
 * Bitweet class: represents a bitweet
 */
class BitweetClientFactory {

  public static function DTOToModel($dto) {
    $bitweetModel = new BitweetModel($dto->getMessage(), $dto->getIdUser(), $dto->getIdChannel());

    $bitweetModel->setId($dto->getId());
    $bitweetModel->setNbVotes($dto->getNbVotes());
    $bitweetModel->setComments($dto->getComments());
    return $bitweetModel;
  }

  public static function ModelToDTO($model) {
  	return new BitweetDTO(
      $model->getId(),
  		$model->getMessage(),
  		$model->getNbVotes(),
  		$model->getComments(),
      $model->getIdUser(),
      $model->getIdChannel()
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

  public static function JsonArrayToDTOArray($jsonArray)
  {
    $dtoArray = array();
    foreach($jsonArray as $json)
    {
      array_push($dtoArray, BitweetClientFactory::JsonToDTO($json));
    }
    return $dtoArray;
  }
}

?>
