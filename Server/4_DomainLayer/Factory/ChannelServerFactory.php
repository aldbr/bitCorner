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

  public static function DTOToJson($dto) {
    return ['id' => $dto->getId(),
            'title' => $dto->getTitle(),
            'bitweets' => $dto->getBitweets()];
  }

  public static function JsonToDTO($json) {
    return new ChannelDTO(
      $json['id'],
      $json['title'],
      $json['bitweets']);
  }
}

?>
