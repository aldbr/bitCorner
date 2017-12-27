<?php

/**
 * User class: represents a user profile
 */
class UserPersistence {

  public function createUser($user) {
    $query = "CREATE (user:User {";
    $query .= "username:'". $user->getUsername() ."',";
    $query .= "password:'". $user->getPassword() ."',";
    $query .= "mail:'". $user->getMail() ."',";
    $query .= "nbFollowers:'". $user->getNbFollowers() ."',";
    $query .= "nbFollowing:'". $user->getNbFollowing() ."'";
    $query .= "})";
    $result = Persistence::run($query);
  }

  public function getUser($id) {

  }

  public function getUsers() {

  }

  public function updateUsername($id, $newUsername) {

  }

  public function updatePassword($id, $newPassword) {

  }

  public function updateMail($id, $newMail) {

  }

  public function updateNbFollowers($id) {

  }

  public function updateNbFollowing($id) {

  }

  public function deleteUser($id) {

  }
}

?>
