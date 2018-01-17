<?php

/**
 * Comment class: represents a comment of a bitweet
 */
class CommentEntity {

  private $id;
  private $message;
  private $nbVote;
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

  public function setId($id) {
    $this->id = $id;
  }

  public function getMessage() {
    return $this->message;
  }

  public function setMessage($message) {
    $this->message = $message;
  }

  public function getNbVotes() {
    return $this->nbVotes;
  }

  public function incrementVote() {
    $this->nbVotes += 1;
  }

  public function decrementVote() {
    $this->nbVotes -= 1;
  }

  public function getBitweetId() {
    return $this->bitweetId;
  }

  public function setBitweetId($bitweetId) {
    $this->bitweetId = $bitweetId;
  }


  public function getUserId() {
    return $this->userId;
  }

  public function setUserId($userId) {
    $this->userId = $userId;
  }

}

?>
