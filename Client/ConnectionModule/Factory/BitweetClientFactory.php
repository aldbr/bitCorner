<?php

/**
 * Bitweet class: represents a bitweet
 */
class BitweetClientFactory {

  public static function DTOToModel($dto) {
  	return new BitweetModel(
      $dto->getMessage(),
      $dto->getNbVotes(),
      $dto->getComments()
  	);
  }

  public static function ModelToDTO($model) {
  	return new BitweetDTO(
  		$model->getMessage(),
  		$model->getNbVotes(),
  		$model->getComments()
  	);
  }
}

?>
