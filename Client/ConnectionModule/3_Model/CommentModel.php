<?php

/**
 * Comment class on the client side
 */
class CommentModel {

  private $id;
  private $message;
  private $nbVotes;
  private $bitweetId;
  private $userId;

  public function __construct($message, $bitweetId, $userId) {
    self::setId(-1);
    self::setMessage($message);
    self::setNbVotes(0);
    self::setBitweetId($bitweetId);
    self::setUserId($userId);
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

  public function setNbVotes($nbVotes) {
    $this->nbVotes = $nbVotes;
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
