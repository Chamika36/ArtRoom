<?php

// Load Config
require_once 'config/config.php';

// Load Helpers
require_once 'helpers/url_helper.php';

// require_once 'libraries/App.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});

?>