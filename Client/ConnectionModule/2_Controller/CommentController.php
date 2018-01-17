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

  // -------------------- Getters --------------------------------

  public function getComment($id) {
  	$commentClientService = new CommentClientService();
  	$commentDTO = $commentClientService->getComment($id);
    return CommentClientFactory::DTOToModel($commentDTO);
  }

  public function getCommentsFromUserId($userId) {
    $commentClientService = new CommentClientService();
    $commentDTOs = $commentClientService->getCommentsFromUserId($userId);
    $commentModels = array();

    if(is_array($commentDTOs)) {
      foreach($commentDTOs as $comment) {
        array_push($commentModels, CommentClientFactory::DTOToModel($comment));
      }
    }

    return $commentModels;
  }


  public function getComments($userId = NULL) {
  	$commentClientService = new CommentClientService();
  	$commentDTOs = $commentClientService->getComments($userId);
  	$commentModels = array();

    if(is_array($commentDTOs)) {
	    foreach($commentDTOs as $comment) {
	      array_push($commentModels, CommentClientFactory::DTOToModel($comment));
	    }
	  }

	  return $commentModels;
  }
}

//Simulate a call from a view
$commentControllerTest = new CommentController();

// ------------------------------------------------------------------------------- CREATE

// $comment1 = new CommentModel("my_first_commentary",10,276);
// $comment2 = new CommentModel("commentaire2",10,263);
// $comment3 = new CommentModel("commentaire3",10,276);
// $commentControllerTest->createComment($comment1);
// $commentControllerTest->createComment($comment2);
// $commentControllerTest->createComment($comment3);

// ------------------------------------------------------------------------------- GET ONE
// $comment = $commentControllerTest->getComment(264);
// var_dump($comment);

// ------------------------------------------------------------------------------- GET ALL FROM USER ID

// $result = $commentControllerTest->getComments(276);
// echo 'There are '.count($result).' comments<basename(path)r/>';

// if(is_array($result)) {
//   foreach($result as $comment) {
//     var_dump($comment);
//     //echo $user->getId().' - '.$user->getUsername().'<br/>';
//   }
// }

// ------------------------------------------------------------------------------- GET ALL


// $result = $commentControllerTest->getComments();
// echo 'There are '.count($result).' comments<basename(path)r/>';

// if(is_array($result)) {
//   foreach($result as $comment) {
//     var_dump($comment);
//     //echo $user->getId().' - '.$user->getUsername().'<br/>';
//   }
// }


?>
