<?php
$path = 'unicode/courses';

$chmod = chmod($path.'/data.txt', 0755);
//
//var_dump($chmod);

file_put_contents($path.'/data.txt', 'Unicode');
