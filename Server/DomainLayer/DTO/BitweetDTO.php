<?php

/**
 * Bitweet class: represents a post typeset by a user
 */
class BitweetDTO {

  private $message;
  private $nbVotes;

  private $comments;

  public function __construct($message, $nbVotes, $comments) {
    $this->message = $message;
    $this->nbVotes = $nbVotes;
    $this->comments = $comments;
  }

  public function getMessage() {
    return $this->message;
  }

  public function getNbVotes() {
    return $this->nbVotes;
  }

  public function getComments() {
    return $this->comments;
  }
}

?>
