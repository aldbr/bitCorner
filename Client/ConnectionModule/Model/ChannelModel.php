<?php

/**
 * Channel class on the client side
 */
class ChannelModel {

  private $id;
  private $title;
  private $bitweets;

  public function __construct($title) {
    self::setId(-1);
    self::setTitle($title);
    self::setBitweets(array());
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
