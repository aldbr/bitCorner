<?php

require_once 'vendor/autoload.php';
use GraphAware\Neo4j\Client\ClientBuilder;


/**
 * Persistence class: class containing the graphAware client to request Neo4j
 */
class Persistence {

  private static $client;

  public static function run($query) {
    if(!isset(self::$client)) {
      self::$client = ClientBuilder::create()
      ->addConnection($GLOBALS['user'], 'http://'.$GLOBALS['name'].':'.$GLOBALS['password'].'@'.$GLOBALS['db'])
      ->build();
    }
    return $result = self::$client->run($query);
  }
}

?>
