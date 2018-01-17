<?php

/**
 * Comment class: represents a comment of a bitweet
 */
class CommentPersistence {

  //MATCH (c:comment), (u:User) WHERE id(c)=200 AND id(u)=350 CREATE (u)-[r:WRITE]->(c) RETURN r
  //MATCH (c:comment), (u:User) WHERE id(c)=200 AND id(u)=350 RETURN r
  //MATCH (u:User)-[WRITE]-(c:comment) WHERE id(c)=200  RETURN c, u
  //MATCH (u:User) WHERE id(u)=276 CREATE (u)-[r:Write]->(c:Comment{msg:"Msg"}) RETURN u,c
  public function createComment($comment) {
    $query = "MATCH (u:User) WHERE id(u) = ".$comment->getUserId()." ";
    $query .= "MATCH (b:Bitweet) WHERE id(b) = ".$comment->getBitweetId()." ";
    $query .= "CREATE (c:Comment { ";
    $query .= "message:'". $comment->getMessage() ."',";
    $query .= "nbVotes:'". $comment->getNbVotes() ."'";
    $query .= "}) ";

    $query .= "CREATE (u)-[write:WRITE]->(c) ";
    $query .= "CREATE (b)-[contain:CONTAIN]->(c) ";

    $result = Persistence::run($query);
  }

  public function getComment($id) {
    $query = "MATCH (c:Comment)-[WRITE]-(u:User),
                    (c:Comment)-[CONTAIN]-(b:Bitweet)
              WHERE id(c) = ".$id."
              RETURN id(c) as id,
                     c.message as message,
                     c.nbVotes as nbVotes,
                     id(b) as bitweetId,
                     id(u) as userId";

    $result = Persistence::run($query);
    $record = $result->getRecord();

    return $this->readCommentRecord($record);
  }

  public function getComments($userId) {
    $query = "MATCH (c:Comment)-[WRITE]-(u:User),
                    (c:Comment)-[CONTAIN]-(b:Bitweet) ";
    if($userId != NULL)
    {
      $query .= "WHERE id(u) = ".$userId." ";
    }
    $query .= "RETURN id(c) as id,
               c.message as message,
               c.nbVotes as nbVotes,
               id(b) as bitweetId,
               id(u) as userId";

    $result = Persistence::run($query);
    $commentEntities = array();

    foreach ($result->getRecords() as $record) {
      array_push($commentEntities,$this->readCommentRecord($record));
    }
    return $commentEntities;
  }

  public function readCommentRecord($record)
  {
    return new CommentEntity(
        $record->value('id'),
        $record->value('message'),
        $record->value('nbVotes'),
        $record->value('bitweetId'),
        $record->value('userId')
      );
  }

  public function updateMessage($id) {

  }

  public function updateNbVotes($id) {

  }

  public function deleteComment($id) {
    $query = "MATCH (c:Comment)-[r]-()
              WHERE id(c) = ".$id."
              DELETE r, c";
    $result = Persistence::run($query);
  }

}

?>
