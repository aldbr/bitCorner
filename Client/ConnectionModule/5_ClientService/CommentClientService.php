<?php

/**
 * This class contains all methods which call the server to manipulate comments 
 */
class CommentClientService {

  // -------------------- Setters --------------------------------

  public function createComment($commentDTO){
    $commentService = new CommentService();
    $commentService->createComment($commentDTO);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentService = new CommentService();
    return $commentService->getComment($id);
  }

  public function getComments() {
  	$commentService = new CommentService();
    return $commentService->getComments();
  }

}

?>
