<?php

/**
 * Comment validation class: clean the value coming from the client
 */
class CommentValidation {

  public static function validateComment($comment) {
    validateId($comment->getId())
    filter_var($comment->getMessage(), FILTER_SANITIZE_STRING);
    filter_var($comment->getNbVotes(), FILTER_SANITIZE_NUMBER_INT);
  }

  private static function validateId($id) {
    filter_var($id, FILTER_SANITIZE_NUMBER_INT);
  }
}

?>
