<?php

require_once 'interfaces/SerializableInterface.php';

require_once 'interfaces/IBar.php';

require_once 'interfaces/ArrayAcces.php';

require_once 'interfaces/AuthInterface.php';

require_once 'interfaces/RoleInterface.php';

require_once 'classes/Auth.php';

$auth = new Auth();

var_dump($auth->login());

//$templateArr = $auth::_MSG_TEMPLATE;
//
//echo '<pre>';
//print_r($templateArr);
//echo '</pre>';
//
//echo '<pre>';
//print_r(Auth::_MSG_TEMPLATE);
//echo '</pre>';