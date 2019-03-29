<?php 

// Config
require_once 'core/Constants.php';

// Composer autoloader 
require_once BASE_URL . 'vendor/autoload.php';

// Core
require_once CORE_FILES . 'Database.php';
require_once CORE_FILES . 'App.php';
require_once CORE_FILES . 'Controller.php';

try {
    $API = new App();
    echo $API->executeAPI();
} catch (Exception $e) {
    echo json_encode(array('error' => $e->getMessage()));
}