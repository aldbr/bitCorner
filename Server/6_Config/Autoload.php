<?php

class Autoload {

    private static $_instance = null;

    public static function load() {
        if (null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s is already started', __CLASS__));
        }

        self::$_instance = new self();

        if (!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
        }
    }

    public static function shutDown() {
        if (null !== self::$_instance) {

            if (!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }

            self::$_instance = null;
        }
    }

    private static function _autoload($class) {
        global $rep;
        $filename = $class . '.php';
        $dir = array('./', '7_WebService/', '6_Config/', '3_DataAccessLayer/', '4_DomainLayer/DTO/', '4_DomainLayer/Entities/', '4_DomainLayer/Factory/',
        '2_AppServiceLayer/', '1_ServiceLayer/', '../Client/ConnectionModule/2_Controller/', '../Client/ConnectionModule/3_Model/', 
        '../Client/ConnectionModule/1_View/', '../Client/ConnectionModule/4_Factory/','../Client/ConnectionModule/5_ClientService/');
        foreach ($dir as $d) {
            $file = $rep . $d . $filename;
            if (file_exists($file)) {
                include $file;
            }
        }
    }

}
?>
