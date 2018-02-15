<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Channel
 */
class ChannelEntityTest extends TestCase {

  public function testTitle() {
    $channel = new ChannelEntity(0, "bitcoin", array());
    // Get
    $this->assertEquals("bitcoin", $channel->getTitle());
    // Set
    $channel->setTitle("bitcoin cash");
    $this->assertEquals("bitcoin cash", $channel->getTitle());
  }
}

?>
