<?php

/**
 * Bitweet class: represents a post typeset by a user
 */
class BitweetPersistence {

  public function createBitweet($bitweet) {
    $query = "MATCH (u:User), (c:Channel) WHERE ";
    $query .= "id(u) = ". $bitweet->getIdUser() ." AND ";
    $query .= "id(c) = ". $bitweet->getIdChannel() ." ";

    $query .= "CREATE (u)-[r:WRITE]->(bitweet:Bitweet {";
    $query .= "message:'". $bitweet->getMessage() ."',";
    $query .= "nbVotes:'". $bitweet->getNbVotes() ."'";
    $query .= "}) ";
    $query .= "CREATE (c)-[r2:CONTAINS]->(bitweet)";

    $result = Persistence::run($query);
  }

  public function getBitweet($id) {
    $query = "MATCH (u:User)-[r:WRITE]->(b:Bitweet), (c:Channel)-[r2:CONTAIN]->(b)
              WHERE id(b) = ".$id."
              RETURN  id(b) as id,
                      b.message as message,
                      b.nbVotes as nbVotes,
                      id(u) as idUser,
                      id(c) as idChannel";
    $result = Persistence::run($query);
    
    return $this->readBitweetRecord($result->getRecord());
  }

  public function getBitweets() {
    $query = "MATCH (u:User)-[r:WRITE]->(b:Bitweet), (c:Channel)-[r2:CONTAIN]->(b)
              RETURN id(b) as id,
                     b.message as message,
                     b.nbVotes as nbVotes,
                     id(u) as idUser,
                     id(c) as idChannel";
    $result = Persistence::run($query);
    $bitweetEntities = array();

    foreach ($result->getRecords() as $record) {
      array_push($bitweetEntities, $$this->readBitweetRecord($record));
    }
    return $bitweetEntities;
  }

  public function getBitweetsFromUser($idUser) {
    $query = "MATCH (u:User)-[r:WRITE]->(b:Bitweet), (c:Channel)-[r2:CONTAIN]->(b)
              WHERE id(u) = ".$idUser."
              RETURN  id(b) as id,
                      b.message as message,
                      b.nbVotes as nbVotes,
                      id(u) as idUser,
                      id(c) as idChannel";
    $result = Persistence::run($query);
    $bitweetEntities = array();

    foreach ($result->getRecords() as $record) {
      array_push($bitweetEntities, $this->readBitweetRecord($record));
    }
    return $bitweetEntities;
  }

  public function getBitweetsFromChannel($idChannel) {
    $query = "MATCH (u:User)-[r:WRITE]->(b:Bitweet), (c:Channel)-[r2:CONTAIN]->(b)
              WHERE id(c) = ".$idChannel."
              RETURN  id(b) as id,
                      b.message as message,
                      b.nbVotes as nbVotes,
                      id(u) as idUser,
                      id(c) as idChannel";
    $result = Persistence::run($query);
    $bitweetEntities = array();

    foreach ($result->getRecords() as $record) {
      array_push($bitweetEntities, $this->readBitweetRecord($record));
    }
    return $bitweetEntities;
  }

  public function updateMessage($id, $newMessage) {

  }

  public function updateNbVotes($id) {

  }

  public function deleteBitweet($id) {
    $query = "MATCH (b:Bitweet)-[r]-()
              WHERE id(b) = ".$id."
              DELETE r, b";
    $result = Persistence::run($query);
  }

  public function readBitweetRecord($record)
  {
    if($record == NULL)
    {
      return NULL;
    }
    
    return new BitweetEntity(
      $record->value('id'),
      $record->value('message'),
      $record->value('nbVotes'),
      array(),
      $record->value('idUser'),
      $record->value('idChannel')
    );
  }
}

?>
