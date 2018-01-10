<?php

/**
 * UserDTO : dto used to the communication between client / server
 */
class UserDTO {

  private $id;
  private $username;
  private $password;
  private $mail;
  private $nbFollowers;
  private $nbFollowing;
  private $bitweets;

  public function __construct($id, $username, $password, $mail, $nbFollowers, $nbFollowing, $bitweets) {
    self::setId($id);
    self::setUsername($username);
    self::setPassword($password);
    self::setMail($mail);
    self::setNbFollowers($nbFollowers);
    self::setNbFollowing($nbFollowing);
    self::setBitweets($bitweets);
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

  public function getNbFollowing() {
    return $this->nbFollowing;
  }

   public function setNbFollowing($nbFollowing) {
    $this->nbFollowing = $nbFollowing;
  }

  public function getBitweets() {
    return $this->bitweets;
  }

  public function setBitweets($bitweets) {
    $this->bitweets = $bitweets;
  }
}

?>
