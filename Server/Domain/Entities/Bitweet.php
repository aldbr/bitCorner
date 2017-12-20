<?php

/**
 * Bitweet class: represents a post typeset by a user
 */
class Bitweet {

  private $message;
  private $nbVotes;

  private $comments;

  public function __construct($message) {
    self::setMessage($message);
    $this->nbVotes = 0;

    $this->comments = array();
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

  public function addComment($comment) {
    $this->comments[] = $comment;
  }

  public function removeComment($index) {
    unset($this->comments[$index]);
  }
}

?>
