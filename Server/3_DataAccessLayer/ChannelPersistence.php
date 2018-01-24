<?php

/**
 * Channel class: represents a kind of news feed containing bitweets of a
 * specific crypto currency
 */
class ChannelPersistence {

  public function createChannel($channel) {
    $query = "CREATE (channel:Channel {";
    $query .= "title:'". $channel->getTitle() ."'";
    $query .= "})";
    $result = Persistence::run($query);
  }

  public function getChannel($id) {
    $query = "MATCH (c:Channel) WHERE id(c) = ".$id."
              RETURN id(c) as id,
                     c.title as title";
    $result = Persistence::run($query);
    
    return $this->readChannelRecord($result->getRecord());
  }

  public function getChannels() {
    $query = "MATCH (c:Channel)
              RETURN id(c) as id,
                     c.title as title";
    $result = Persistence::run($query);
    $channelEntities = array();

    foreach ($result->getRecords() as $record) {
      array_push($channelEntities, $this->readChannelRecord($record));
    }
    return $channelEntities;
  }

  public function updateTitle($id, $newTitle) {

  }

  public function deleteChannel($id) {
    $query = "MATCH (c:Channel)-[r]-()
              WHERE id(c) = ".$id."
              DELETE r, c";
    $result = Persistence::run($query);
  }

  public function readChannelRecord($record)
  {
    if($record == NULL)
    {
      return NULL;
    }
    
    return new ChannelEntity(
        $record->value('id'),
        $record->value('title'),
        array()
    );
  }
}

?>
