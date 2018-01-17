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
}

?>
