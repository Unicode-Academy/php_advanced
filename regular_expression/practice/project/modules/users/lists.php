<?php

//$data['title'] = 'Danh sách người dùng';
//$data['content'] = 'Nội dung';

$title = 'Danh sách người dùng';
$content = 'Nội dung';

$listUsers = [
    'Người dùng 1',
    'Người dùng 2',
    'Người dùng 3',
];

$pageTitle = 'Quản lý người dùng';

render('lists', compact('title', 'content', 'listUsers', 'pageTitle'));