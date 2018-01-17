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
    $query = "MATCH (u:User) WHERE id(u) = ".$id." 
              RETURN id(u) as id,
                     u.username as username,
                     u.password as password,
                     u.mail as mail,
                     u.nbFollowers as nbFollowers,
                     u.nbFollowing as nbFollowing";
    $result = Persistence::run($query);
    $record = $result->getRecord();
    return new UserEntity(
        $record->value('id'),
        $record->value('username'),
        $record->value('password'),
        $record->value('mail'),
        $record->value('nbFollowers'),
        $record->value('nbFollowing'),
        array()
      );
  }

  public function getUsers() {
    $query = "MATCH (u:User) 
              RETURN id(u) as id,
                     u.username as username,
                     u.password as password,
                     u.mail as mail,
                     u.nbFollowers as nbFollowers,
                     u.nbFollowing as nbFollowing";
    $result = Persistence::run($query);
    $userEntities = array();

    foreach ($result->getRecords() as $record) {
      $user = new UserEntity(
        $record->value('id'),
        $record->value('username'),
        $record->value('password'),
        $record->value('mail'),
        $record->value('nbFollowers'),
        $record->value('nbFollowing'),
        array()
      );
      array_push($userEntities, $user);
    }
    return $userEntities;
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
