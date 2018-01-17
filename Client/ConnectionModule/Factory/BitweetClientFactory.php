<?php

/**
 * Bitweet class: represents a bitweet
 */
class BitweetClientFactory {

  public static function DTOToModel($dto) {
    $bitweetModel = new BitweetModel($dto->getMessage());

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
  		$model->getComments()
  	);
  }
}

?>
