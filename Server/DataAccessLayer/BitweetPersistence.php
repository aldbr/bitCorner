<?php

/**
 * Bitweet class: represents a post typeset by a user
 */
class BitweetPersistence {

  public function createBitweet($bitweet) {
    $query = "CREATE (bitweet:Bitweet {";
    $query .= "message:'". $bitweet->getMessage() ."',";
    $query .= "nbVotes:'". $bitweet->getNbVotes() ."'";
    $query .= "})";
    $result = Persistence::run($query);
  }

  public function getBitweet($id) {

  }

  public function getBitweets($idUser) {

  }

  public function updateMessage($id, $newMessage) {

  }

  public function updateNbVotes($id) {

  }

  public function deleteBitweet($index) {

  }
}

?>
