# CURL TRONG PHP

## CURL là gì?

cURL viết tắt của Client URL là một công cụ dòng lệnh (command line tool) dùng để kiểm tra kết nối từ URL và cho phép truyền dữ liệu. cURL sử dụng nhiều giao thức hỗ trợ khác nhau như: HTTP, HTTPS, FTPS,… cURL ra đời từ năm 1997, được viết bởi Daniel Stenberg. Chúng được lập trình để hoạt động mà không cần có sự tương tác của người dùng.

## Quy trình làm việc với PHP CURL

- Bước 1: Khởi tạo CURL
- Bước 2: Cấu hình thông số cho CURL
- Bước 3: Thực thi CURL
- Bước 4: Ngắt CURL, giải phóng dữ liệu

## Code mẫu PHP CURL

```php
// Tạo mới một CURL
$ch = curl_init();

// Cấu hình cho CURL
curl_setopt($ch, CURLOPT_URL, "https://unicode.vn");

// Thực thi CURL
curl_exec($ch);

// Ngắt CURL, giải phóng
curl_close($ch);
```

## Cấu hình PHP CURL

**Cú pháp:**

```php
curl_setopt($curl_object, config_name, $config_value);
```

**Trong đó:**

- $curl_object: Đối tượng CURL
- config_name: Tên cấu hình (Không phải là chuỗi, phần này giống như 1 hằng số)
- $config_value: Giá trị cấu hình

```php
curl_setopt($ch, CURLOPT_URL, "https://unicode.vn");
```

**Danh sách tên cấu hình**

Xem đầy đủ tại link: https://www.php.net/manual/en/function.curl-setopt.php

**Cấu hình hay dùng**

- CURLOPT_URL: Đường dẫn tới URL cần xử lý
- CURLOPT_RETURNTRANSFER: Có trả về kết quả khi thực thi CURL hay không
- CURLOPT_USERAGENT: Giả lập trình duyệt
- CURLOPT_TIMEOUT: Thiết lập timeout cho request
- CURLOPT_FILE: Lưu kết quả vào file (Phải mở file trước, dùng fopen)
- CURLOPT_POST: Thiết lập gửi dữ liệu theo phương thức $\_POST (true hoặc false)
- CURLOPT_POSTFIELDS: Mảng dữ liệu gửi theo phương thức $\_POST
- CURLOPT_HEADER: Trả về header của link cần request hay không? (true, false)
- CURLOPT_HTTPHEADER: Thông tin mảng Header
- CURLOPT_INFILESIZE: Thiết lập gửi file lên request curl (Truyền vào dung lượng file lấy được từ $\_FILE)
- CURLOPT_FOLLOWLOCATION: Không cho chuyển hướng (true hoặc false), áp dụng cho các trường hợp request bị chuyển hướng
- CURLOPT_SSL_VERIFYPEER và CURLOPT_SSL_VERIFYHOST: Cho phép chạy HTTPS (Nếu domain của là http nhưng url request là https hãy gán false)
- CURLOPT_COOKIE: Gửi chuỗi cookie vào CURL REQUEST
- CURLOPT_CUSTOMREQUEST: Gửi phương thức (Chấp nhận các phương thức ngoài $\_GET, $\_POST)

##Thực hành CURL

###Bài 1: Sử dụng CURL viết chương trình lấy nội dung từ website khác

Gợi ý: Dùng CURL GET và Regular Expression

###Bài 2: Sử dụng CURL download ảnh từ website khác về server

Gợi ý: Dùng CURL GET và xử lý file

###Bài 3: Sử dụng CURL đăng nhập vào website khác

Gợi ý: Dùng CURL POST, CURL GET, Regular Expression

###Bài 4: Dùng CURL upload file lên website khác

Gợi ý: Dùng CURL POST, CURL HEADER

###Bài 5: Dùng CURL để gửi dữ liệu vào Database của website khác (Web đích cho phép)

Gợi ý: Dùng CURL POST
