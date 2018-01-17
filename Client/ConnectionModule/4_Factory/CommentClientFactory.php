<?php

/**
 * Comment class: represents a comment
 */
class CommentClientFactory {

  public static function DTOToModel($dto) {
  	$commentModel = new CommentModel($dto->getUsername(), $dto->getPassword(), $dto->getMail());
    
    $commentModel->setId($dto->getId());
    $commentModel->setNbFollowers($dto->getNbFollowers());
    $commentModel->setNbFollowing($dto->getNbFollowing());
    $commentModel->setBitweets($dto->getBitweets());

    return $commentModel;
  }

  public static function ModelToDTO($model) {
  	return new CommentDTO(
      $model->getId(),
  		$model->getUsername(),
  		$model->getPassword(),
  		$model->getMail(),
  		$model->getNbFollowers(),
  		$model->getNbFollowing(),
  		$model->getBitweets()
  	);
  }
}

?>
