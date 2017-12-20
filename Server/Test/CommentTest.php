<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Comment
 */
class CommentTest extends TestCase {

  public function testMessage() {
    $comment = new Comment("message", 0);
    // Get
    $this->assertEquals("message", $comment->getMessage());
    // Set
    $comment->setMessage("modified message");
    $this->assertEquals("modified message", $comment->getMessage());
  }

  public function testVotes() {
    $comment = new Comment("message", 0);
    // Get
    $this->assertEquals(0, $comment->getNbVotes());
    // Set
    $comment->incrementVote();
    $this->assertEquals(1, $comment->getNbVotes());
    $comment->decrementVote();
    $comment->decrementVote();
    $this->assertEquals(-1, $comment->getNbVotes());
  }

}

?>
