<?php
/*
 * Lấy số điện thoại trong 1 văn bản nội dung
 *
 * */

$subject = 'Lorem Ipsum is simply dummy text 0388875179 of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining 0123456789 essentially unchanged. 016495327 It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

$pattern = '/0\d{9}/';

/*
 * Lưu ý: Nếu muốn cắt nội dung nào => Chỉ viết biểu thức liên quan đến nội dung đó
 *
 * Hàm preg_match() sẽ khớp giá trị đầu tiền
 *
 * */

preg_match($pattern, $subject, $matches);

if (!empty($matches[0])){
    echo 'Số điện thoại tìm được: '.$matches[0];
}else{
    echo 'Không có số điện thoại';
}


echo '<hr/>';

preg_match_all($pattern, $subject, $matches);

if (!empty($matches[0])){
    echo 'Số điện thoại tìm được: <br/>';
    foreach ($matches[0] as $item){
        echo '- '.$item.'<br/>';
    }
}