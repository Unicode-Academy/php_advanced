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

    echo '<ul class="list-unstyled d-flex gap-2">
<li><a href="?module=download_file&path='.$load->getPath($filename).'"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</a></li>
<li><a target="_blank" href="'.$load->getPath($filename).'"><i class="fa fa-external-link" aria-hidden="true"></i> Open</a></li>
<li><a href="#" onclick="event.preventDefault(); window.history.back();"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a></li>
</ul>';

    if ($load->isFileType($filename, 'officedocument') || $load->isFileType($filename, 'pdf') || $load->isFileType($filename, 'image')){

        echo '<iframe style="width: 100%; height: 600px" src="https://docs.google.com/gview?url='.$load->getFilenameUrl($filename).'&embedded=true"></iframe>';
    }elseif($load->isFileType($filename, 'text')){
        $sourcePath = $load->getPath($filename);
        $cachePath = './caches/'.md5(uniqid());
        $check = false;
        if (!empty($_COOKIE['view_file'])){
            $file = json_decode($_COOKIE['view_file'], true);

            if (!empty($file[$sourcePath])){
                $check = true;
                $cachePath = $file[$sourcePath];
            }
        }

        if (!$check || !file_exists($cachePath)){
            copy($sourcePath, $cachePath);
        }

        echo '<pre><code class="">';
        $contentFile = file_get_contents($cachePath);
        $contentFile = htmlentities($contentFile);
        echo $contentFile;
        echo '</code></pre>';
        $file = [
            $sourcePath => $cachePath
        ];
        setcookie('view_file', json_encode($file), 0, '/');
    }else{
        echo '<p>Không có xem trước</p>';
    }

}
