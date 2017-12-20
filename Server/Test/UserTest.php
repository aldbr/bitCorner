<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers User
 */
class UserTest extends TestCase {

  public function testUsername() {
    $user = new User("toto", "1234", "toto@yopmail.com");
    // Get
    $this->assertEquals("toto", $user->getUsername());
    // Set
    $user->setUsername("popo");
    $this->assertEquals("popo", $user->getUsername());
  }

  public function testPassword() {
    $user = new User("toto", "1234", "toto@yopmail.com");
    // Get
    $this->assertEquals("1234", $user->getPassword());
    // Set
    $user->setPassword("4567");
    $this->assertEquals("4567", $user->getPassword());
  }

  public function testMail() {
    $user = new User("toto", "1234", "toto@yopmail.com");
    // Get
    $this->assertEquals("toto@yopmail.com", $user->getMail());
    // Set
    $user->setMail("popo@yopmail.com");
    $this->assertEquals("popo@yopmail.com", $user->getMail());
  }

  public function testNbFollowers() {
    $user = new User("toto", "1234", "toto@yopmail.com");
    // Get
    $this->assertEquals(0, $user->getNbFollowers());
    // Set
    $user->incrementNbFollowers();
    $this->assertEquals(1, $user->getNbFollowers());
    $user->decrementNbFollowers();
    $this->assertEquals(0, $user->getNbFollowers());
    $user->decrementNbFollowers();
    $this->assertEquals(0, $user->getNbFollowers());
  }

  public function testNbFollowing() {
    $user = new User("toto", "1234", "toto@yopmail.com");
    // Get
    $this->assertEquals(0, $user->getNbFollowing());
    // Set
    $user->incrementNbFollowing();
    $this->assertEquals(1, $user->getNbFollowing());
    $user->decrementNbFollowing();
    $this->assertEquals(0, $user->getNbFollowing());
    $user->decrementNbFollowing();
    $this->assertEquals(0, $user->getNbFollowing());
  }

}

?>
