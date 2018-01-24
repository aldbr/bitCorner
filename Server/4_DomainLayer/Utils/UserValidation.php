<?php

/**
 * User validation class: clean the value coming from the client
 */
class UserValidation {

  public static function validateUser($user) {
    validateId($user->getId())
    filter_var($user->getUsername(), FILTER_SANITIZE_STRING);
    filter_var($user->getPassword(), FILTER_SANITIZE_STRING);
    filter_var($user->getNbFollowers(), FILTER_SANITIZE_NUMBER_INT);
    filter_var($user->getNbFollowing(), FILTER_SANITIZE_NUMBER_INT);
  }

  private static function validateId($id) {
    filter_var($id, FILTER_SANITIZE_NUMBER_INT);
  }
}

?>
