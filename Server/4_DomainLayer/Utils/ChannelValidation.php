<?php

/**
 * Channel validation class: clean the value coming from the client
 */
class ChannelValidation {

  public static function validateChannel($channel) {
    validateId($channel->getId())
    filter_var($channel->getTitle(), FILTER_SANITIZE_STRING);
  }

  private static function validateId($id) {
    filter_var($id, FILTER_SANITIZE_NUMBER_INT);
  }
}

?>
