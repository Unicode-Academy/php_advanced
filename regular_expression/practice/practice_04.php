<?php
$subject = '
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
<p><img src="https://picsum.photos/450" alt="" /></p>
<h2>What is Lorem Ipsum?</h2>
<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
<h2>Where does it come from?</h2>
<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<p><img src="https://picsum.photos/400" alt="" /></p>';

$pattern = '~<img(\s+[a-z]+\s*=\s*"[^"]*")*\s+src\s*=\s*"[^"]+"(\s+[a-z]+\s*=\s*"[^"]*")*\s*(/>|>)~';

$check = preg_match($pattern, $subject);

if ($check){
    echo 'Trong nội dung có ảnh';
}else{
    echo 'Trong nội dung không có ảnh';
}