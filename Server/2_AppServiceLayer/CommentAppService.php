<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class CommentAppService {

  // -------------------- Attributes ------------------------------

  private $commentPersistence;

  // -------------------- Constructor ------------------------------

  public function __construct()
  {
    $this->$commentPersistence = new CommentPersistence();
  }

  // -------------------- Setters --------------------------------

  public function createComment($commentDTO){
  	$commentEntity = CommentServerFactory::DTOToEntity($commentDTO);
  	$this->$commentPersistence->createComment($commentEntity);
  }

  public function deleteComment($id){
  	$this->$commentPersistence->deleteComment($id);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentEntity = $this->$commentPersistence->getComment($id);
    return CommentServerFactory::EntityToDTO($commentEntity);
  }

  public function getComments($userId) {
  	$commentEntities = $this->$commentPersistence->getComments($userId);
  	$commentDTOs = array();

    if(is_array($commentEntities)) {
	   foreach($commentEntities as $comment) {
	      array_push($commentDTOs, CommentServerFactory::EntityToDTO($comment));
	    }
	  }

	  return $commentDTOs;
  }
}

?>
