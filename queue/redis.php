<?php

use Predis\Client;

require_once 'vendor/autoload.php';
$client = new Client();
// $client->set('name', 'hoangan');
$value = $client->get('name');
echo $value;
