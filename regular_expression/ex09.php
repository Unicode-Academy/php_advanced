<?php
$subject = '<img title="Ảnh" height="200" src="https://unicode.vn/images/anh.jpg" alt="" width=""/>';

$pattern = '<img(\s+[a-z-]+\s*=\s*"[^"]*")*\ssrc="([^"]+)"(\s+[a-z-]+\s*=\s*"[^"]*")*\s*/*>';

$check = preg_match($pattern, $subject, $matches);

if (!empty($matches[2])){
    echo 'Link ảnh: '.$matches[2];
}