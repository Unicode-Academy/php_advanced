<?php

$type = filter_input(INPUT_POST, 'item_type', FILTER_SANITIZE_SPECIAL_CHARS);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

$msg = null;

if ($type=='file'){

    if (!empty($name)){
        //Kiểm tra file đúng định dạng

        $pattern = '~^[\w\s]+\.[a-z]+$~i';
        if (preg_match($pattern, $name)){

            $parentDir = Load::getParentDir();

            Make::createFile($parentDir, $name);

            redirect('?path='.$parentDir);

        }else{
            $msg = 'Định dạng file không đúng';
        }
    }else{
        $msg = 'Tên file bắt buộc phải nhập';
    }

}else{

}

if (!empty($msg)){
    ?>
    <div class="alert alert-danger text-center">
        <?php echo $msg; ?>
    </div>
    <?php
}