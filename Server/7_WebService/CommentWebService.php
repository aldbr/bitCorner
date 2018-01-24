<?php

class CommentWebService
{
	public static function createComment($params)
	{
		$commentService = new CommentService();
		$jsonDecoded = json_decode($params, true);
		$commentDTO = CommentServerFactory::JsonToDTO($jsonDecoded);

		if($commentDTO != NULL)
		{
			$commentService->createComment($commentDTO);
		}
		else
		{
			throw new Exception("Create comment did not work");
		}
	}

	public static function deleteComment($params)
	{
		$commentService = new CommentService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$commentDTO = $commentService->deleteComment($jsonDecoded['id']);
		}
		else
		{
			throw new Exception("Delete comment did not work");
		}
	}

	public static function getComment($params)
	{
		$commentService = new CommentService();
		$jsonDecoded = json_decode($params, true);

		if(isset($jsonDecoded['id']))
		{
			$commentDTO = $commentService->getComment($jsonDecoded['id']);
			$commentJSON = CommentServerFactory::DTOToJSON($commentDTO);
			return json_encode($commentJSON);
		}
		else
		{
			return json_encode(NULL);
		}
	}

	public static function getComments($params)
	{
		$commentService = new CommentService();
    	$jsonDecoded = json_decode($params, true);
		if(array_key_exists('userId', $jsonDecoded))
		{
			$commentDTOs = $commentService->getComments($jsonDecoded['userId']);
      		$jsonArray = CommentServerFactory::DTOArrayToJsonArray($commentDTOs);
  			return json_encode($jsonArray);
		}
		else
		{
			return json_encode(NULL);
		}
	}

}




?>
