<?php
require_once 'classes/admin/Post.php';

require_once 'classes/News.php';

$news = new \App\Oop\News('Unicode');
echo '<br/>';
$news->getList();