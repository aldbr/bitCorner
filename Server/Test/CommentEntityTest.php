<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Comment
 */
class CommentEntityTest extends TestCase {

  public function testMessage() {
    $comment = new CommentEntity("message", 0);
    // Get
    $this->assertEquals("message", $comment->getMessage());
    // Set
    $comment->setMessage("modified message");
    $this->assertEquals("modified message", $comment->getMessage());
  }

  public function testVotes() {
    $comment = new CommentEntity("message", 0);
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
