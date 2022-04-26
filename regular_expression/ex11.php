<?php

$subject = '<img title="Ảnh" height="200" src="https://unicode.vn/images/anh.jpg" alt="" width=""/>';

$pattern = '<img(?:\s+[a-z-]+\s*=\s*"[^"]*")*\ssrc="([^"]+)"(?:\s+[a-z-]+\s*=\s*"[^"]*")*\s*/*>';

$check = preg_match($pattern, $subject, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';