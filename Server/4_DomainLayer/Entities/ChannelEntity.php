<?php

/**
 * Channel class: represents a kind of news feed containing bitweets of a
 * specific crypto currency
 */
class ChannelEntity {

  private $id;
  private $title;
  private $bitweets;

  public function __construct($id, $title, $bitweets) {
    self::setId($id);
    self::setTitle($title);
    self::setBitweets($bitweets);
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getBitweets() {
    return $this->bitweets;
  }

  public function setBitweets($bitweets) {
    $this->bitweets = $bitweets;
  }

  public function addBitweet($bitweet) {
    $this->bitweets[] = $bitweet;
  }

  public function removeBitweet($index) {
    unset($this->bitweets[$index]);
  }
}

?>
