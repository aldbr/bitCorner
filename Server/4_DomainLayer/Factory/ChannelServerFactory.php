<?php

/**
 * Channel class: represents a kind of news feed containing bitweets of a
 * specific crypto currency
 */
class ChannelServerFactory {

  public static function DTOToEntity($dto) {
  	return new ChannelEntity(
      $dto->getId(),
      $dto->getTitle(),
      $dto->getBitweets()
  	);
  }

  public static function EntityToDTO($entity) {
  	return new ChannelDTO(
      $entity->getId(),
      $entity->getTitle(),
      $entity->getBitweets()
  	);
  }
}

?>
