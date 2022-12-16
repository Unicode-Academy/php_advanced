<?php
$path = filter_input(
    INPUT_GET,
    'path',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
);

if (file_exists($path)){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($path));
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    readfile($path);
}else{
    ?>
    <div class="alert alert-danger text-center">
        File không tồn tại
    </div>
    <?php
}
