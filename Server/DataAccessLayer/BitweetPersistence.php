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
    $query = "MATCH (b:Bitweet) WHERE id(b) = ".$id." RETURN b";
    $result = Persistence::run($query);
    $record = $result->getRecord();
    return new BitweetEntity(
        $record->value('id'),
        $record->value('message'),
        $record->value('nbVotes'),
        array()
      );
  }

  public function getBitweets() {
    $query = "MATCH (b:Bitweet)
              RETURN id(b) as id,
                     b.message as message,
                     b.nbVotes as nbVotes";
    $result = Persistence::run($query);
    $bitweetEntities = array();

    foreach ($result->getRecords() as $record) {
      $bitweet = new BitweetEntity(
        $record->value('id'),
        $record->value('message'),
        $record->value('nbVotes'),
        array()
      );
      array_push($bitweetEntities, $bitweet);
    }
    return $bitweetEntities;
  }

  public function getBitweetsFromUser($idUser) {

  }

  public function getBitweetsFromChannel($idChannel) {

  }

  public function updateMessage($id, $newMessage) {

  }

  public function updateNbVotes($id) {

  }

  public function deleteBitweet($index) {

  }
}

?>
