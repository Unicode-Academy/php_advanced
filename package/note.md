# Package Manager

- Công cụ quản lý gói / thư viện / dependencies
- Javascript: npm, yarn,...
- PHP: composer

## File config

- Javascript: package.json
- PHP: composer.json

## PSR-4 Autoload

- Sử dụng require, include
  => Mất thời gian và rắc rối

- Sử dụng spl_autoload_register, spl_autoload_functions, spl_autoload_extensions...
  => Từ các hàm này cùng với khái niệm namespace trong PHP, các lập trình viên xây dựng cho mình một bộ code tự động nạp

- PSR-4

* Để dễ dàng chia sẻ dùng lại code giữa các framework, giữa các dự án ..., cộng đồng PHP thống nhất một cách thức tự động nạp thư viện theo một chuẩn bố trí thư viện
* Việc thống nhất đó hình thành một tiêu chuẩn nên tuân theo đó là PSR-4 Autoload

```
\<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>
```

- NameSpace : Tiền đố đầu tiên bắt buộc phải có - được hiểu là tên vendor. Tên này do bạn tự đặt, sao cho không xung đột tên các thư viện khác.

- SubNameSpaces: Các namespace con (theo sau NameSpace đầu tiên - vendor)

- ClassName: Bắt buộc phải có và phải có tên file PHP trùng tên ClassName ở thư mục tương ứng với namespace cuối cùng (ClassName.php), trong file đó sẽ định nghĩa nội dung của code của lớp.

## Classmap Autoload

## Cài đặt Package theo phiên bản và cập nhật

## Composer Update và Composer Install

- Composer Update: Chạy các bản cập nhật trong file composer.json
- Composer Install: Ưu tiên chạy trong file composer.lock, nếu không có chạy trong file composer.json

Tips: Clone Repository --> Composer install

Composer Update thường sử dụng ở môi trường dev

composer install --no-dev --> Chỉ cài require

composer install --> Cài cả require và require-dev
