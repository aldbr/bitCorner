<?php

/**
 * Channel class: represents a kind of news feed containing bitweets of a
 * specific crypto currency
 */
class ChannelDTO {

  private $title;
  private $bitweets;

  public function __construct($title, $bitweets) {
    $this->title = $title;

    $this->bitweets = $bitweets;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getBitweets() {
    return $this->bitweets;
  }
}

?>
