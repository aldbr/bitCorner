<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

//config loading
require_once(__DIR__ . '/6_Config/Config.php');
//autoloader loading
require_once(__DIR__ . '/6_Config/Autoload.php');
Autoload::load();

//include (__DIR__ . '/../Client/ConnectionModule/2_Controller/UserController.php');
//include (__DIR__ . '/../Client/ConnectionModule/2_Controller/BitweetController.php');
//include (__DIR__ . '/../Client/ConnectionModule/2_Controller/CommentController.php');
//include (__DIR__ . '/../Client/ConnectionModule/2_Controller/ChannelController.php');

include (__DIR__ . '/BitCornerWebServiceHttp.php');

?>
