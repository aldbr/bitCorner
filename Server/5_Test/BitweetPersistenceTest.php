<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__."/../index.php";


/**
 * @covers BitweetPersistence
 */
class BitweetPersistenceTest extends TestCase {

  public function testCreateBitweet() {
    $bitweet = new BitweetEntity("Go miser sur OmiseGo les gars", 0, array());
    $BitweetPersistence = new BitweetPersistence();
    $BitweetPersistence->createBitweet($bitweet);
  }
}

?>
