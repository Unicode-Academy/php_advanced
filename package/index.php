<?php

use Html2Text\Html2Text;
use PragmaRX\Random\Random;

require_once './vendor/autoload.php';

$html = new Html2Text('<h1>Học PHP không khó</h1>');

//echo $html->getText();

$random = new Random();
//echo $random->get();

something();
