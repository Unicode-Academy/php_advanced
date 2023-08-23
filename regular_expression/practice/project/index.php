<?php
define('_DIR_ROOT', __DIR__);

require_once 'includes/functions.php';
require_once 'routes.php';

$module = 'home';
$action = 'lists';

if (!empty($_GET['url'])){
    handleUrl($module, $action);
}

$path = 'modules/'.$module.'/'.$action.'.php';

if (file_exists($path)){
    require_once $path;
}else{
    require_once 'modules/404.php';
}