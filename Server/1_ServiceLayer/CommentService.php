<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class CommentService {

  // -------------------- Setters --------------------------------

  public function createComment($commentDTO){
    $commentAppService = new CommentAppService();
    $commentAppService->createComment($commentDTO);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentAppService = new CommentAppService();
    return $commentAppService->getComment($id);
  }

  public function getComments($userId = NULL) {
  	$commentAppService = new CommentAppService();
    return $commentAppService->getComments($userId);
  }
}

?>
