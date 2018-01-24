<?php

/**
 * channel class: represents a channel
 */
class ChannelClientFactory {

  public static function DTOToModel($dto) {
    $channelModel = new ChannelModel($dto->getTitle());

    $channelModel->setId($dto->getId());
    $channelModel->setBitweets($dto->getBitweets());

    return $channelModel;
  }

  public static function ModelToDTO($model) {
  	return new ChannelDTO(
      $model->getId(),
  		$model->getTitle(),
  		$model->getBitweets()
  	);
  }

  public static function DTOToJson($dto) {
    return [
            'id' => $dto->getId(),
            'title' => $dto->getTitle(),
            'bitweets' => $dto->getBitweets()
           ];
  }

  public static function JsonToDTO($json) {
    return new ChannelDTO(
      $json['id'],
      $json['title'],
      $json['bitweets']);
  }

  public static function JsonArrayToDTOArray($jsonArray)
  {
    $dtoArray = array();
    foreach($jsonArray as $json)
    {
      array_push($dtoArray, ChannelClientFactory::JsonToDTO($json));
    }
    return $dtoArray;
  }
}

?>
