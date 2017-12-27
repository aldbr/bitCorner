<?php

/**
 * Comment class: represents a comment of a bitweet
 */
class CommentEntity {

  private $message;
  private $nbVote;
  private $user;

  public function __construct($message, $user) {
    self::setMessage($message);
    $this->nbVotes = 0;
    $this->user = $user;
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

  public function getUser() {
    return $this->user;
  }

}

?>
