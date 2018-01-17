<?php

/**
 * Comment class: represents a comment of a bitweet
 */
class CommentDTO {

  private $message;
  private $nbVotes;
  private $user;

  public function __construct($message, $nbVotes, $user) {
    $this->message = $message;
    $this->nbVotes = $nbVotes;
    $this->user = $user;
  }

  public function getMessage() {
    return $this->message;
  }

  public function getNbVotes() {
    return $this->nbVotes;
  }

  public function getUser() {
    return $this->user;
  }
}

?>
