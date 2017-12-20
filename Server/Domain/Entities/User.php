<?php

/**
 * User class: represents a user profile
 */
class User {

  private $username;
  private $password;
  private $mail;

  private $nbFollowers;
  private $nbFollowing;

  private $bitweets;

  public function __construct($username, $password, $mail) {
    self::setUsername($username);
    self::setPassword($password);
    self::setMail($mail);

    $this->nbFollowers = 0;
    $this->nbFollowing = 0;

    $this->bitweets = array();
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getMail() {
    return $this->mail;
  }

  public function setMail($mail) {
    $this->mail = $mail;
  }

  public function getNbFollowers() {
    return $this->nbFollowers;
  }

  public function incrementNbFollowers() {
    $this->nbFollowers += 1;
  }

  public function decrementNbFollowers() {
    if($this->nbFollowers > 0)
      $this->nbFollowers -= 1;
  }

  public function getNbFollowing() {
    return $this->nbFollowing;
  }

  public function incrementNbFollowing() {
    $this->nbFollowing += 1;
  }

  public function decrementNbFollowing() {
    if($this->nbFollowing > 0)
      $this->nbFollowing -= 1;
  }

  public function getBitweets() {
    return $this->bitweets;
  }

  public function addBitweet($bitweet) {
    $this->bitweets[] = $bitweet;
  }

  public function removeBitweet($index) {
    unset($this->bitweets[$index]);
  }
}

?>
