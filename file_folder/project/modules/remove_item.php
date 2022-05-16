<?php
$load = new Load();
$filename = filter_input(INPUT_GET, 'filename', FILTER_SANITIZE_SPECIAL_CHARS);

$parentDir = Load::getParentDir();

$msg = null;

if (!empty($filename)){

    $path = _DATA_DIR.'/'.$parentDir.'/'.$filename;

    if ($load->isType($path)=='file'){

        Make::deleteFile($parentDir, $filename);

    }else{
        Make::deleteFolder($parentDir, $filename);
    }
}else{
    $msg = 'Tên file và folder không được để trống';
}

if (!empty($msg)){
    ?>
    <div class="alert alert-danger text-center">
        <?php echo $msg; ?>
    </div>
    <?php
}else{
    redirect('?path='.$parentDir);
}