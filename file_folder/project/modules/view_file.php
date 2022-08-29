<?php
$parentDir = dirname(Load::getParentDir());
$load = new Load($parentDir);
$path = filter_input(
        INPUT_GET,
    'path',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
);
if (!empty($path)){
    $filename = $load->getFilename($path);
    echo '<h2>File: "'.$filename.'"</h2>';

    echo '<p>Full Path: '.$load->getPath($filename).'</p>';

    echo '<p>File size: '.$load->getSize($filename, 'KB').'</p>';

    echo '<p>MIME-type: '.$load->getFileType($filename).'</p>';
}
?>