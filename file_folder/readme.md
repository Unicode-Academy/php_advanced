#THAO TÁC VỚI FILE - FOLDER TRONG PHP

##Thao tác với file là gì?

Thao tác với file là bao gồm các thao tác: Tạo file, đọc file, ghi file, xoá file, kiểm tra file tồn tại, lấy dung lượng file,...

##Mở file

Trước khi thao tác với nội dung của file, ta cần phải thực hiện bước mở file. Nếu file chưa có, hệ thống sẽ tự tạo file mới.

**Cú pháp:**

```php
$file = fopen($filename, $mode);
```

**Trong đó:**

`$filename` là đường dẫn đến file
`$mode` là chế độ mở file:
- r: Mở file chỉ để đọc.
- w: Mở file chỉ để ghi. Xóa đi nội dung cũ hoặc tạo ra file mới nếu file không tồn tại.
- a: Mở file chỉ để ghi, tự tạo file mới nếu không tồn tại (Không xoá dữ liệu cũ)
- x: Tạo file mới chỉ để ghi (Nếu file đã tồn tại sẽ báo lỗi)
- r+: Mở file để đọc và ghi.
- w+: Mở file để đọc và ghi. Xóa đi nội dung cũ hoặc tạo ra file mới nếu file không tồn tại.
- a+: Mở file để đọc và ghi. Tạo ra file mới nếu file không tồn tại.
- x+: Tạo file mới để đọc và ghi.

##Ghi file

Ghi file có tác dụng ghi 1 nội dung nào đó vào file

**Cú pháp:**

```php
fwrite($file, $content);
```

**Trong đó:**

`$file`: Đối tượng mở file
`$content`: Nội dung cần ghi

Ví dụ:

```php
$file = fopen('data.txt', 'w+');
$content = 'Nội dung';
fwrite($file, $content);
```

###Ghi file bằng hàm file_put_contents()

Sử dụng hàm này không cần mở file, chỉ cần truyền đường dẫn tới file

**Cú pháp:**

```php
file_put_contents($filename, $content);
```

**Trong đó:**

$filename: Đường dẫn tới file cần ghi (Nếu chưa có, hệ thống sẽ tự tạo)
$content: Nội dung cần ghi


##Đọc file

Đọc file sẽ lấy toàn bộ nội dung của file gán vào biến để sử dụng


**Cú pháp:**

```php
$data = file($filename);
echo '<pre>';
print_r($data);
echo '</pre>';
```


Trong đó: $filename là đường dẫn tới file
Hàm file() sẽ trả về mảng nội dung, mỗi phần tử của mảng tương ứng với 1 dòng

###Đọc file bằng hàm file_get_contents()

Hàm này sẽ đọc tất cả file, chứ không đọc từng dòng như hàm file()

**Cú pháp:**

```php
$data = file_get_contents($filename);
echo $data;
```

Trong đó:

$filename: Đường dẫn đến file cần đọc

##Đóng file

Cú pháp:

```php
fclose($file);
```

Trong đó:

$file là đối tượng đã dùng để mở


##Xoá file


Cú pháp:

```php
unlink($filename);
```

Trong đó:

$filename là đường dẫn tới file cần xoá


##Kiểm tra file tồn tại

Cú pháp:

```php
file_exists($filename);
```

Trong đó:

$filename là đường dẫn tới file cần kiểm tra
Nếu tồn tại hàm sẽ trả về TRUE, ngược lại sẽ trả về FALSE

##Lấy dung lượng file

Cú pháp:

```php
filesize($filename);
```

Trong đó:

$filename là đường dẫn tới file cần lấy
Đơn vị dung lượng hàm này là byte

##Đổi tên file

Hàm này dùng để đổi tên file hoặc di chuyển file đến thư mục khác


Cú pháp:

```php
rename($old_file, $new_file);
```


Trong đó:

$old_file: Đường dẫn file cũ
$new_file: Đường dẫn file mới

##Sao chép file (Copy)

Cú pháp:

```php
copy($old_file, $new_file);
```


Trong đó:

$old_file: Đường dẫn file cũ
$new_file: Đường dẫn file mới

##Tạo folder

Cú pháp:

```php
mkdir($folder);
```


Trong đó:

$folder: Đường dẫn tới folder cần tạo

##Kiểm tra folder tồn tại

Cú pháp:

```php
is_dir($folder);
```


Trong đó:

$folder: Đường dẫn tới folder cần kiểm tra
