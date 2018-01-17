<?php

/**
 * Small example of controller which manipulate comment model
 */
class CommentController {

  // -------------------- Setters --------------------------------

  public function createComment($commentModel) {
    $commentClientService = new CommentClientService();
    $commentDTO = CommentClientFactory::ModelToDTO($commentModel);
    $commentClientService->createComment($commentDTO);
  }

  public function deleteComment($id) {
    $commentClientService = new CommentClientService();
    $commentDTO = $commentClientService->deleteComment($id);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentClientService = new CommentClientService();
  	$commentDTO = $commentClientService->getComment($id);
    return CommentClientFactory::DTOToModel($commentDTO);

  }

  public function getComments() {
  	$commentClientService = new CommentClientService();
  	$commentDTOs = $commentClientService->getComments();
  	$commentModels = array();

    if(is_array($commentDTOs)) {
	  foreach($commentDTOs as $comment) {
	    array_push($commentModels, CommentClientFactory::DTOToModel($comment));
	  }
	}

	return $commentModels;
  }

}

?>
