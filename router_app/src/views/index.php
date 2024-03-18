<h1>Trang chủ</h1>
<h2>Danh sách người dùng</h2>
<?php if ($users) {
    foreach ($users as $user) {
        echo $user->name . ' - ' . $user->email . '<br/>';
    }
} ?>