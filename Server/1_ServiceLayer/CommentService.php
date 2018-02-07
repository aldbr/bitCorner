<?php

/**
 * This class contains all methods called by a client to interact with the server
 */
class CommentService {

  // -------------------- Attributes ------------------------------

  private $commentAppService;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->commentAppService = new CommentAppService();
  }

  // -------------------- Setters --------------------------------

  public function createComment($commentDTO){
    $this->commentAppService->createComment($commentDTO);
  }

  public function deleteComment($id) {
    $this->commentAppService->deleteComment($id);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
    return $this->commentAppService->getComment($id);
  }

  public function getComments($userId = NULL) {
    return $this->commentAppService->getComments($userId);
  }
}

?>
