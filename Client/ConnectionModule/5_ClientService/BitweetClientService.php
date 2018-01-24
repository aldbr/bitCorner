<?php

/**
 * This class contains all methods which call the server to manipulate bitweets
 */
class BitweetClientService {

  // -------------------- Setters --------------------------------

  public function createBitweet($bitweetDTO) {
    $bitweetService = new BitweetService();
    $params = json_encode(BitweetClientFactory::DTOToJson($bitweetDTO));
    $json = BitCornerWebService::callMethod('createBitweet',$params);
  }

  public function deleteBitweet($id) {
    $bitweetService = new BitweetService();
    $params = json_encode(['id' => $id]);
    $json = BitCornerWebService::callMethod('deleteBitweet',$params);
  }

  // -------------------- Setters --------------------------------

  public function getBitweet($id) {
  	$bitweetService = new BitweetService();
    $params = json_encode(['id' => $id]);

    $json = BitCornerWebService::callMethod('getBitweet',$params);

    $jsonArray = json_decode($json, true);
    return BitweetClientFactory::JsonToDTO($jsonArray);
  }

  public function getBitweets() {
  	$bitweetService = new BitweetService();
    $json = BitCornerWebService::callMethod('getBitweets');

    $jsonArray = json_decode($json, true);
    return BitweetClientFactory::JsonArrayToDTOArray($jsonArray);
  }

  public function getBitweetsFromUser($idUser) {
  	$bitweetService = new BitweetService();
    $params = json_encode(['idUser' => $idUser]);

    $json = BitCornerWebService::callMethod('getBitweetsFromUser',$params);

    $jsonArray = json_decode($json, true);
    return BitweetClientFactory::JsonArrayToDTOArray($jsonArray);
  }

  public function getBitweetsFromChannel($idChannel) {
  	$bitweetService = new BitweetService();
    $params = json_encode(['idChannel' => $idChannel]);

    $json = BitCornerWebService::callMethod('getBitweetsFromChannel',$params);

    $jsonArray = json_decode($json, true);
    return BitweetClientFactory::JsonArrayToDTOArray($jsonArray);
  }
}

?>
