<?php

$action = NULL;
$params = NULL;

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];

	if(isset($_REQUEST['params']))
	{
		$params = $_REQUEST['params'];
	}
	
	$json = BitCornerWebService::callMethod($action, $params);

	echo $json;
}

?>
