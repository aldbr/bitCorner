<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Bitweet
 */
class BitweetTest extends TestCase {

  public function testMessage() {
    $bitweet = new Bitweet("message");
    // Get
    $this->assertEquals("message", $bitweet->getMessage());
    // Set
    $bitweet->setMessage("modified message");
    $this->assertEquals("modified message", $bitweet->getMessage());
  }

  public function testVotes() {
    $bitweet = new Bitweet("message");
    // Get
    $this->assertEquals(0, $bitweet->getNbVotes());
    // Set
    $bitweet->incrementVote();
    $this->assertEquals(1, $bitweet->getNbVotes());
    $bitweet->decrementVote();
    $bitweet->decrementVote();
    $this->assertEquals(-1, $bitweet->getNbVotes());
  }

}

?>
