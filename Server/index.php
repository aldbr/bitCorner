<?php

//config loading
require_once(__DIR__ . '/Config/Config.php');
//autoloader loading
require_once(__DIR__ . '/Config/Autoload.php');
Autoload::load();

include (__DIR__ . '/../Client/ConnectionModule/Controller/UserController.php');
include (__DIR__ . '/../Client/ConnectionModule/Controller/BitweetController.php');
include (__DIR__ . '/../Client/ConnectionModule/Controller/ChannelController.php');
?>
