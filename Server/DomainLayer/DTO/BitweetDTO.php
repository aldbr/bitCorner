<?php

/**
 * Bitweet class: represents a post typeset by a user
 */
class BitweetDTO {

  private $message;
  private $nbVotes;

  private $comments;

  public function __construct($id, $message, $nbVotes, $comments) {
    self::setId($id);
    self::setMessage($message);
    self::setNbVotes($nbVotes);
    self::setComments($comments);
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

  public function getComments() {
    return $this->comments;
  }

  public function setComments($comments) {
    $this->comments = $comments;
  }
}

?>
