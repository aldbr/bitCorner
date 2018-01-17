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

  public function deleteBitweet($id) {
    $commentService = new CommentService();
    $commentService->deleteComment($id);
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
