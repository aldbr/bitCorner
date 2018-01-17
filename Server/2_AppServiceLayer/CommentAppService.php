<?php

/**
 * This class contains algorithms and make the transition between the service and the DAL
 */
class CommentAppService {

  // -------------------- Setters --------------------------------

  public function createComment($commentDTO){
  	$commentEntity = CommentServerFactory::DTOToEntity($commentDTO);
  	$commentPersistence = new CommentPersistence();
  	$commentPersistence->createComment($commentEntity);
  }

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentPersistence = new CommentPersistence();
  	$commentEntity = $commentPersistence->getComment($id);
    return CommentServerFactory::EntityToDTO($commentEntity);
  }

  public function getComments($userId) {
  	$commentPersistence = new CommentPersistence();
  	$commentEntities = $commentPersistence->getComments($userId);
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
