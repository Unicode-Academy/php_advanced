<?php
define('_DIR_ROOT', __DIR__);

//Xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$dirRoot = str_replace('\\', '/', _DIR_ROOT);

$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

$folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));

$web_root = $web_root . $folder;

define('_WEB_ROOT', $web_root);

/*
 * Tự động load configs
 *
 * */
$configs_dir = scandir('configs');
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}

//Load all services
if (!empty($config['app']['service'])) {
    $allServices = $config['app']['service'];
    if (!empty($allServices)) {
        foreach ($allServices as $serviceName) {
            if (file_exists('app/core/' . $serviceName . '.php')) {
                require_once 'app/core/' . $serviceName . '.php';
            }
        }
    }
}

//Load Lib
require_once 'core/Hash.php';

require_once 'core/Paginate.php';

//Load Service Provider Class
require_once 'core/ServiceProvider.php';

//Load View Class
require_once 'core/View.php';

//Load
require_once 'core/Load.php';

//Middleware
require_once 'core/Middlewares.php';

require_once 'core/Route.php'; //Load Route class

//Kiểm tra config và load Database
if (!empty($config['database'])) {

    $db_config = $config['database'];

    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
    }
}

require_once 'app/App.php'; //Load app

require_once 'core/Session.php'; //Load Session Class

//Load core helpers
require_once 'core/Helper.php';

//Load all heplers
$allHelpers = scandir('app/helpers');
if (!empty($allHelpers)) {
    foreach ($allHelpers as $item) {
        if ($item != '.' && $item != '..' && file_exists('app/helpers/' . $item)) {
            require_once 'app/helpers/' . $item;
        }
    }
}

require_once 'core/Model.php'; //Load Base Model

require_once 'core/Template.php'; //Load Template

require_once 'core/Controller.php'; //Load base controller

require_once 'core/Request.php'; //Load Request

require_once 'core/Response.php'; //Load Response
