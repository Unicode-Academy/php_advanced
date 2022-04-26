<?php
$string = 'https://vnexpress.net';

$pattern = '~Https://[a-z]+[a-z0-9-_\.]*\.[a-z]{2,}~i';

$check = preg_match($pattern, $string);

var_dump($check);

echo '<hr/>';

$string = 'Quận Nam Từ Liêm';

$pattern = '/(quận)/iu';

$string = preg_replace($pattern, '', $string);

echo $string;

echo '<hr/>';

$html = "\n".'<div class="post-lists">'."\n".'
<h3>Bài viết 1</h3>'."\n".'
<div class="description">Mô tả bài viết</div>'."\n".'
</div>';

//Bóc tách dữ liệu
$pattern = '~<div class="post-lists">(.+)</div>~siu';
preg_match($pattern, $html, $matches);

if (!empty($matches[1])){
    $htmlInner = $matches[1];
    preg_match('~<h3.*>(.+)</h3>~isu', $htmlInner, $matches);

    if (!empty($matches[1])){
        $title = trim($matches[1]);

        echo 'Tiêu đề: '.$title;
    }
}

$html = '<ul class="list">
<li>0388875179</li>
<li>0123456798</li>
<li>0388875179</li>
<li>038887517</li>
</ul>';

$pattern = '~^<li>(0\d{9})</li>$~im';

preg_match_all($pattern, $html, $matches);

if (!empty($matches[1])){
    echo 'Danh sách số điện thoại hợp lệ: <br/>';
    foreach ($matches[1] as $phone){
        echo '- '.$phone.'<br/>';
    }
}
