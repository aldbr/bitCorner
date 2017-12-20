<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Channel
 */
class ChannelTest extends TestCase {

  public function testTitle() {
    $channel = new Channel("bitcoin");
    // Get
    $this->assertEquals("bitcoin", $channel->getTitle());
    // Set
    $channel->setTitle("bitcoin cash");
    $this->assertEquals("bitcoin cash", $channel->getTitle());
  }
}

?>
