<?php
require_once 'config.php';
require_once 'includes/functions.php';
require_once 'includes/Load.php';
require_once 'includes/Make.php';
require_once 'blocks/header.php';

if (!empty($_GET['module'])){
    $module = $_GET['module'];
}else{
    $module = 'home';
}

$path = 'modules/'.$module.'.php';

if (file_exists($path)){
    require_once $path;
}

require_once 'blocks/footer.php';
