<?php

/**
 * User class: represents a user profile
 */
class UserDTO {

  private $username;

  private $nbFollowers;
  private $nbFollowing;

  private $bitweets;

  public function __construct($username, $nbFollowers, $nbFollowing, $bitweets) {
    $this->username = $username;

    $this->nbFollowers = $nbFollowers;
    $this->nbFollowing = $nbFollowing;

    $this->bitweets = $bitweets;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getNbFollowers() {
    return $this->nbFollowers;
  }

  public function getNbFollowing() {
    return $this->nbFollowing;
  }

  public function getBitweets() {
    return $this->bitweets;
  }
}

?>
