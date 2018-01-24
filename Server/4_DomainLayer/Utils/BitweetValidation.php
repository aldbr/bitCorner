<?php

/**
 * Bitweet validation class: clean the value coming from the client
 */
class BitweetValidation {

  public static function validateBitweet($bitweet) {
    validateId($bitweet->getId())
    filter_var($bitweet->getMessage(), FILTER_SANITIZE_STRING);
    filter_var($bitweet->getNbVotes(), FILTER_SANITIZE_NUMBER_INT);
  }

  private static function validateId($id) {
    filter_var($id, FILTER_SANITIZE_NUMBER_INT);
  }
}

?>
