<?php
//Xoá file
//
$path = 'images/hk-1649435751810.jpg';

if (file_exists($path)){

    $status = unlink($path);

    var_dump($status);

}else{
    echo 'File không tồn tại';
}


//Kiểm tra file tồn tại

//$status = file_exists('data.txt');
//
//var_dump($status);

echo '<br/>';
$size = filesize('content.txt'); //Đơn vị byte

/*
 * Đổi đơn vị byte => KB: byte/1024
 *
 * Đổi đơn vị KB => MB: KB/1024
 *
 * Đổi đơn vị MB => GB: MB/1024
 * */

echo $size;

echo '<br/>';

//Đổi tên file

//$path = 'data/unicode.txt';

//$status = rename($path, 'data/php.txt');

//var_dump($status);


//Di chuyển file

//$path = 'includes/php.txt';
//$status = rename($path, 'data/php_new.txt');
//
//var_dump($status);

//Sao chép file
$path = 'data/php_new.txt';

//$status = copy($path, 'includes/php.txt');

//$status = move_uploaded_file($path, 'includes/unicode.txt');

//var_dump($status);