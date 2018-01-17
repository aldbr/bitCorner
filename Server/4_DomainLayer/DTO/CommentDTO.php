<?php

/**
 * Comment class: represents a comment of a bitweet
 */
class CommentDTO {

  private $id;
  private $message;
  private $nbVotes;
  private $bitweetId;
  private $userId;

  public function __construct($id, $message, $nbVotes, $bitweetId, $userId) {
    $this->id = $id;
    $this->message = $message;
    $this->nbVotes = $nbVotes;
    $this->bitweetId = $bitweetId;
    $this->userId = $userId;
  }

  public function getId() {
    return $this->id;
  }

  public function getMessage() {
    return $this->message;
  }

  public function getNbVotes() {
    return $this->nbVotes;
  }

  public function getBitweetId() {
    return $this->bitweetId;
  }

  public function getUserId() {
    return $this->userId;
  }
}

?>
