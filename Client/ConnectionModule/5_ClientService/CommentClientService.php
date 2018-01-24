<?php

/**
 * This class contains all methods which call the server to manipulate comments
 */
class CommentClientService {

  // -------------------- Setters --------------------------------

  public function createComment($commentDTO){
    $commentService = new CommentService();
    $params = json_encode(CommentClientFactory::DTOToJson($commentDTO));
    $json = BitCornerWebService::callMethod('createComment',$params);
  }

  public function deleteComment($id) {
    $commentService = new CommentService();
    $params = json_encode(['id' => $id]);
    $json = BitCornerWebService::callMethod('deleteComment',$params);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentService = new CommentService();
    $params = json_encode(['id' => $id]);

    $json = BitCornerWebService::callMethod('getComment',$params);

    $jsonArray = json_decode($json, true);
    return CommentClientFactory::JsonToDTO($jsonArray);
  }

  public function getComments($userId = NULL) {
  	$commentService = new CommentService();
    $params = json_encode(['userId' => $userId]);

    $json = BitCornerWebService::callMethod('getComments', $params);
    
    $jsonArray = json_decode($json, true);

    return CommentClientFactory::JsonArrayToDTOArray($jsonArray);
  }

}

?>
