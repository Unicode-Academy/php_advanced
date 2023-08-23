<?php

/*
 * Nếu phương thức không phải là tĩnh => Có thể gọi giống như cách gọi phương thức tĩnh
 *
 * => Không có trường hợp ngược lại
 *
 * Lưu ý khi truy cập giữa phương thức tĩnh và thuộc tính tĩnh trong nội bộ Class
 *
 * - Nếu muốn truy cập tới thuộc tính tĩnh trong class => Sử dụng cú pháp: self::$tenThuocTinh (Áp dụng cả với phương thức tĩnh và phương thức bình thường)
 *
 * - Nếu muốn truy cập tới phương thức tĩnh trong class => Sử dụng cú pháp: self::tenPhuongThuc() (Áp dụng cả với phương thức tĩnh và phương thức bình thường)

   - Nếu muốn truy cập từ phương thức tĩnh tới thuộc tính bình thường => cần phải tạo thuộc tính trung gian (dạng tĩnh), gán thuộc tính trung gian đó có giá trị $this ở trong phương thức khởi tạo __construct() => Khởi tạo object từ class => Sử dụng cách gọi thông qua thuộc tính trung gian theo cú pháp sau:

    self::$tenTrungGian->tenThuocTinhThuong

  -
* */

require_once 'classes/Person.php';

$person = new Person();

echo Person::$fullName.'<br/>';

echo Person::$age.'<br>';

echo Person::getName().'<br/>';

echo $person->location.'<br/>';

//echo Person::getAge().'<br/>';
echo $person->getAge();
