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

  public function deleteComment($id) {
    $commentAppService = new CommentAppService();
    $commentAppService->deleteComment($id);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentAppService = new CommentAppService();
    $jsonArray = CommentServerFactory::DTOToJson($commentAppService->getComment($id));
    return json_encode($jsonArray);
  }

  public function getComments($userId = NULL) {
  	$commentAppService = new CommentAppService();
    return $commentAppService->getComments($userId);
  }
}

?>
