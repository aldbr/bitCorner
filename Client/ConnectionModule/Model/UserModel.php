<?php

/**
 * User class on the client side
 */
class UserModel {

  private $id;
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

    self::setId(-1);
    self::setNbFollowers(0);
    self::setNbFollowing(0);

    self::setBitweets(array());
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
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

  public function setNbFollowers($nbFollowers) {
    $this->nbFollowers = $nbFollowers;
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

  public function setNbFollowing($nbFollowing) {
    $this->nbFollowing = $nbFollowing;
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
