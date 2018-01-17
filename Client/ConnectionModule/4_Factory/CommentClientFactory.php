<?php

/**
 * Comment class: represents a comment
 */
class CommentClientFactory {

  public static function DTOToModel($dto) {
  	$commentModel = new CommentModel($dto->getMessage(), $dto->getBitweetId(), $dto->getUserId());
    
    $commentModel->setId($dto->getId());
    $commentModel->setNbVotes($dto->getNbVotes());

    return $commentModel;
  }

  public static function ModelToDTO($model) {
  	return new CommentDTO(
      $model->getId(),
  		$model->getMessage(),
  		$model->getNbVotes(),
      $model->getBitweetId(),
  		$model->getUserId()
  	);
  }
}

?>
