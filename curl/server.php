<?php
echo '<h1>Unicode Academy</h1>';
echo '<h2>Khoá học PHP nâng cao</h2>';
$header = getallheaders();
echo '<pre>';
print_r($header);
echo '</pre>';

echo $_SERVER['REQUEST_METHOD'];

//
echo '<h3>Phương thức get</h3>';
echo '<pre>';
print_r($_GET);
echo '</pre>';

echo '<h3>Phương thức post</h3>';
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<h3>Phương thức put</h3>';

$_PUT = [];

if ($_SERVER['REQUEST_METHOD']=='PUT'){
    parse_str(file_get_contents('php://input'), $_PUT);
}

echo '<pre>';
print_r($_PUT);
echo '</pre>';

echo '<h3>Phương thức patch</h3>';

$_PATCH = [];

if ($_SERVER['REQUEST_METHOD']=='PATCH'){
    parse_str(file_get_contents('php://input'), $_PATCH);
}

echo '<pre>';
print_r($_PATCH);
echo '</pre>';

echo '<h3>Phương thức delete</h3>';

$_DELETE = [];

if ($_SERVER['REQUEST_METHOD']=='DELETE'){
    parse_str(file_get_contents('php://input'), $_DELETE);
}

echo '<pre>';
print_r($_DELETE);
echo '</pre>';