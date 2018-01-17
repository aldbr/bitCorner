<?php

/**
 * Comment class on the client side
 */
class BitweetModel {

  private $message;
  private $nbVotes;
  private $userId;

  public function __construct($message) {
    self::setMessage($message);
    self::setNbVotes(0);
    self::setUserId(-1);
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

  public function getUserId() {
    return $this->userId;
  }

  public function setUserId($userId) {
    $this->userId = $userId;
  }

}

?>
