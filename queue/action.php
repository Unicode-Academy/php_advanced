<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    //Thêm công việc vào hàng đợi
    $jobData = [
        'type' => 'sendMail',
        'data' => [
            'name' => $name,
            'email' => $email,
            'message' => 'Chào mừng đến với Unicode'
        ]
    ];
    addJobToQueue($jobData);
    echo 'Đăng ký thành công';
}
