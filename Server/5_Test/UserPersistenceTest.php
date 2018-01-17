<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__."/../index.php";


/**
 * @covers UserPersistence
 */
class UserPersistenceTest extends TestCase {

  public function testCreateUser() {
    $user = new UserEntity("toto", "1234", "toto@yopmail.com", 0, 0, array());
    $UserPersistence = new UserPersistence();
    $UserPersistence->createUser($user);
  }
}

?>
