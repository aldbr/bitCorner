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
    $query .= "CREATE (c)-[r2:CONTAIN]->(bitweet)";

    $result = Persistence::run($query);
  }

  public function getBitweet($id) {
    /*$query = "MATCH (u:User)-[r:WRITE]->(b:Bitweet), (c:Channel)-[r2:CONTAIN]->(b)
              WHERE id(b) = ".$id."
              RETURN  id(b) as id,
                      b.message as message,
                      b.nbVotes as nbVotes,
                      id(u) as idUser,
                      id(c) as idChannel";
    $result = Persistence::run($query);
    return $this->readBitweetRecord($result->getRecord());*/
    return NULL;
  }

  public function getBitweets() {
    $query = "MATCH (userBitweet:User)-[r:WRITE]->(bitweet:Bitweet), (channel:Channel)-[r2:CONTAIN]->(bitweet)
              WITH userBitweet, bitweet, channel
              OPTIONAL MATCH (bitweet)-[r3:CONTAIN]->(comment:Comment), (userComment:User)-[r4:WRITE]->(comment)
              RETURN id(bitweet) as idBitweet,
                     bitweet.message as bitweetMessage,
                     bitweet.nbVotes as nbVotes,
                     userBitweet.username as bitweetUsername,
                     comment.message as commentMessage,
                     userComment.username as commentUsername,
                     id(userBitweet) as idUser,
                     id(channel) as idChannel,
                     id(comment) as idComment";
    $result = Persistence::run($query);
    $bitweetEntities = array();

    foreach ($result->getRecords() as $record) {
      $bitweetEntity = $this->readBitweetRecord($record);
      $bitweetId = $bitweetEntity->getId();

      if(!array_key_exists($bitweetId, $bitweetEntities))
      {
        $bitweetEntities[$bitweetId] = $bitweetEntity;
      }
      else
      {
        $bitweetEntity = $bitweetEntities[$bitweetId];
      }

      $this->addBitweetCommentRecord($record, $bitweetEntity);
    }

    return $bitweetEntities;
  }

  public function getBitweetsFromUser($idUser) {
    $query = "MATCH (userBitweet:User)-[r:WRITE]->(bitweet:Bitweet), (channel:Channel)-[r2:CONTAIN]->(bitweet)
              WHERE id(userBitweet) = ".$idUser."
              WITH userBitweet, bitweet, channel
              OPTIONAL MATCH (bitweet)-[r3:CONTAIN]->(comment:Comment), (userComment:User)-[r4:WRITE]->(comment)
              RETURN id(bitweet) as idBitweet,
                     bitweet.message as bitweetMessage,
                     bitweet.nbVotes as nbVotes,
                     userBitweet.username as bitweetUsername,
                     comment.message as commentMessage,
                     userComment.username as commentUsername,
                     id(userBitweet) as idUser,
                     id(channel) as idChannel,
                     id(comment) as idComment";
    $result = Persistence::run($query);
    $bitweetEntities = array();

    foreach ($result->getRecords() as $record) {
      $bitweetEntity = $this->readBitweetRecord($record);
      $bitweetId = $bitweetEntity->getId();

      if(!array_key_exists($bitweetId, $bitweetEntities))
      {
        $bitweetEntities[$bitweetId] = $bitweetEntity;
      }
      else
      {
        $bitweetEntity = $bitweetEntities[$bitweetId];
      }

      $this->addBitweetCommentRecord($record, $bitweetEntity);
    }

    return $bitweetEntities;
  }

  public function getBitweetsFromChannel($idChannel) {
    $query = "MATCH (userBitweet:User)-[r:WRITE]->(bitweet:Bitweet), (channel:Channel)-[r2:CONTAIN]->(bitweet)
              WHERE id(channel) = ".$idChannel."
              WITH userBitweet, bitweet, channel
              OPTIONAL MATCH (bitweet)-[r3:CONTAIN]->(comment:Comment), (userComment:User)-[r4:WRITE]->(comment)
              RETURN id(bitweet) as idBitweet,
                     bitweet.message as bitweetMessage,
                     bitweet.nbVotes as nbVotes,
                     userBitweet.username as bitweetUsername,
                     comment.message as commentMessage,
                     userComment.username as commentUsername,
                     id(userBitweet) as idUser,
                     id(channel) as idChannel,
                     id(comment) as idComment";
    $result = Persistence::run($query);
    $bitweetEntities = array();

    foreach ($result->getRecords() as $record) {
      $bitweetEntity = $this->readBitweetRecord($record);
      $bitweetId = $bitweetEntity->getId();

      if(!array_key_exists($bitweetId, $bitweetEntities))
      {
        $bitweetEntities[$bitweetId] = $bitweetEntity;
      }
      else
      {
        $bitweetEntity = $bitweetEntities[$bitweetId];
      }

      $this->addBitweetCommentRecord($record, $bitweetEntity);
    }

    return $bitweetEntities;
  }

  public function updateMessage($id, $newMessage) {

  }

  public function upVote($id) {
    $query = "MATCH (b:Bitweet)
              WHERE id(b) = ".$id."
              SET b.nbVotes = b.nbVotes + 1";
    $result = Persistence::run($query);
  }

  public function downVote($id) {
    $query = "MATCH (b:Bitweet)
              WHERE id(b) = ".$id."
              SET b.nbVotes = b.nbVotes - 1";
    $result = Persistence::run($query);
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
      $record->value('idBitweet'),
      $record->value('bitweetMessage'),
      $record->value('nbVotes'),
      array(),
      $record->value('idUser'),
      $record->value('bitweetUsername'),
      $record->value('idChannel')
    );
  }

  public function addBitweetCommentRecord($record, $bitweet)
  {
    if($record != NULL && $record->value('idComment') != NULL)
    {
      $commentEntity = new CommentEntity(
        $record->value('idComment'),
        $record->value('commentMessage'),
        0, //Comments vote not implemented yet
        $record->value('idBitweet'),
        $record->value('idUser'),
        $record->value('commentUsername')
      );

      $bitweet->addComment($commentEntity);
    }
  }
}

?>
