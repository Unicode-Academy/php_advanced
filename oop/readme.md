#LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG (OOP)

##Phương pháp lập trình truyền thống

**1. Phương pháp lập trình không có cấu trúc**

**Tổng quan:**

- Phương pháp này dành cho những người mới bắt đầu học lập trình, không sử dụng hàm
- Tất cả dòng lệnh đều viết trong file từ trên xuống dưới, dữ liệu đều dùng chung và tất cả các biến đều ở dạng toàn cục.

**Ưu điểm:** 

- Viết code nhanh
- Chương trình chạy rất nhanh (Vì không phải thông qua giai đoạn gọi hàm, gọi đối tượng,...)

**Nhược điểm:**

- Gặp khó khăn khi xây dựng các chương trình lớn (Vì dòng lệnh rất dài rất khó bảo trì và quản lý dòng code)
- Khi chương trình có những dòng lệnh được lặp lại thì phải copy thành nhiều chỗ, và khi sửa một chỗ thì phải sửa tất cả các chỗ còn lại
- Chỉ viết được các chương trình nhỏ
- Chương trình không khoa học, rất khó sửa chữa và bảo trì
- Phương pháp này chỉ phù hợp dành cho học tập, tính ứng dụng thực tế không cao

**2. Phương pháp lập trình hướng thủ tục (Hay còn gọi là hướng hàm)**

**Tổng quan:**

- Phương pháp này lấy các hàm làm nền tảng cơ bản để xây dựng chương trình, chương trình sẽ được phân nhỏ thành các hàm và mỗi hàm sẽ có chức năng riêng biệt
- Các hàm sẽ gọi qua lại lẫn nhau để tạo thành một hệ thống của chương trình
- Phương pháp này sẽ sử dụng cả biến cục bộ và biến toàn cục

**Ưu điểm:**

- Dễ quản lý và bảo trì
- Viết được nhiều chương trình lớn hơn

**Nhược điểm:**

- Phương pháp này khá khó hiểu với người mới
- Với các chương trình lớn rất khó bảo trì
- Các đối tượng có thể không đại diện chính xác cho vấn đề cần xử lý
- Bảo mật kém

**3. Phương pháp lập trình hướng Module**

**Tổng quan:**

- Phương pháp này sẽ gom các hàm có cùng chức năng thành 1 module
- Khi cần sử dụng module nào sẽ gọi module đó
- Một chương trình sẽ có thể có nhiều module

**Ưu điểm:**

- Xây dựng được các chương trình lớn
- Code rõ ràng, dễ quản lý, bào trì và nâng cấp
- Phân theo module (folder, file) nên mạch lạc, rõ ràng

**Nhược điểm:**

- Dữ liệu không có sự gắn kết với nhau
- Dữ liệu không bị hủy sau khi gọi hàm

##Phương pháp lập trình hướng đối tượng

- Lập trình hướng đối tượng (Viết tắt là OOP) là phương pháp lập trình hiện đại có hầu hết ở các ngôn ngữ lập trình
- OOP giải quyết các hạn chế của phương pháp lập trình truyền thống
- OOP sẽ tập trung vào đối tượng để giải quyết vấn đề

**Thành phần chính của OOP:**

**_1. Class (Lớp):_**

- Class để định nghĩa chung cho 1 thực thể (Hiểu đơn giản là bản thiết kế)
- Trong 1 Class bao gồm thuộc tính (biến) và phương thức (hàm)

_**2. Object (Đối tượng):**_

Object dùng để thể hiện cụ thể từ bản thiết kế (Class)

=> 1 class có thể có 1 hoặc nhiều object

**Tính chất của OOP:**

1. Tính trừu tượng (abstraction)
2. Tính kế thừa (inheritance)
3. Tính đóng gói (encapsulation)
4. Tính đa hình (polymorphism)

**Ưu điểm của OOP:**

- Dễ dàng quản lý code khi có sự thay đổi chương trình
- Dễ mở rộng dự án
- Tiết kiệm được tài nguyên đáng kể cho hệ thống
- Có tính bảo mật cao
- Có tính tái sử dụng cao

**Nhược điểm của OOP:** 

Khó tiếp cận với người mới hoặc những người đã quen với phương pháp lập trình truyền thống

##Class - Object

**Class**

- Class dùng để định nghĩa chung cho 1 thực thể (Hiểu đơn giản là bản thiết kế)
- Trong class sẽ có thuộc tính (biến), phương thức (hàm), hằng số (khai báo bằng từ khoá const)
- Hiểu thực tế hơn: Class chính là việc đóng gói: biến, hàm, hằng số để sử dụng chặt nó chẽ hơn


Cú pháp định nghĩa Class

```php
class TenClass{

    visibility $property1;
    visibility $property2;
    
    const constant1 = value1;
    const constan2 = value2;
    
    visibility function methodName1(){
        //Method body 1
    }
    
    visibility function methodName2(){
            //Method body 2
        }
}
```

Trong đó:

- TenClass đặt tên theo quy tắc Pascal Case (Các ký tự đầu của mỗi chữ sẽ viết hoa)
- visibility: Phạm vi truy cập (public, protected, private)
- Tên thuộc tính đặt tên theo quy tắc camelCase (Chữ đầu tiên viết thường, các ký tự đầu từ chữ thứ 2 trở đi sẽ viết hoa)
- Tên hằng số sẽ viết HOA và nối với nhau bằng gạch dưới
- Tên phương thức sẽ đặt tên theo quy tắc camelCase (Giống như thuộc tính)

**Object**

- Object là sự thể hiện của Class
- Hiểu đơn giản nếu muốn sử dụng các phương thức, thuộc tính, hằng số trong class thì cần phải khởi tạo object

Cú pháp khởi tạo Object:

```php
$tenObject = new TenClass();
```

Với các Class không có giá trị khởi tạo có thể sử dụng cú pháp sau:

```php
$tenObject = new TenClass;
```

Cú pháp gọi thuộc tính, phương thức, hằng số

```php
$tenObject->tenThuocTinh; //Gọi thuộc tính


$tenObject->tenPhuongThuc(); //Gọi phương thức (Nếu phương thức có tham số, cần bổ sung)


$tenObject::TEN_HANG_SO; //Gọi hằng số


//Có thể gọi hằng số theo cách sau:
TenClass::TEN_HANG_SO;
```

##Phạm vi truy cập

Trong lập trình hướng đối tượng có 3 phạm vi truy cập cơ bản

- public: Cho phép truy cập ở mọi vị trí (Trong và ngoài class)
- protected: Cho phép truy cập ở class kế thừa 
- private: Chỉ được phép truy cập trong class

##Phương thức khởi tạo và phương thức huỷ

Trong lập trình hướng đối tượng luôn tồn tại 2 phương thức đặc biệt: `__construct()` và `__destruct()`

Phương thức __construct() sẽ được chạy đầu tiên khi khởi tạo đối tượng => Gọi là phương thức khởi tạo

Phương thức __destruct() sẽ chạy sau khi chương trình chạy xong (Đối tượng không được sử dụng nữa) => Gọi là phương thức huỷ

##Kế thừa

Kế thừa class (extends) là 1 trong những đặc tính nổi bật của lập trình hướng đối tượng

Để kế thừa class, bạn cần dùng từ khoá extends khi định nghĩa class

Khi kế thừa, class con được phép sử dụng các thuộc tính, phương thức từ class cha và ngược lại (Trong trường hợp đối tượng được khởi tạo từ class con)

Lập trình hướng đối tượng cho phép kế thừa đa tầng (Trừ class final)

Ví dụ mẫu:

```php
class Database{
    public function __construct(){
        
    }
    
    public function fetch(){
    
    }
}

```

```php

class Bussiness extends Database{

    public function getDetail(){
        return $this->fetch();
    }
}
```

```php

$bussiness = new Bussiness();


$data = $bussiness->getDetail();

```

##Thuộc tính tĩnh và phương thức tĩnh

Phương thức tĩnh và thuộc tính tĩnh (static) thì nó có thể truy cập trực tiếp mà không phải tạo đối tượng của lớp

Class là tĩnh nếu tất cả các phương thức và thuộc tĩnh là tĩnh

**Cách khai báo:** 

```php
class Person{
    public static $fullName;
    
    public static function getName(){
    
    }
}
```

**Cách gọi:**

```php
TenClass::$tenThuocTinh;

TenClass::tenPhuongThuc();
```

##Lớp trừu tượng (Abstract Class)

Lớp trừu tượng là lớp được khai báo bằng từ khoá `abstract` phía trước từ khoá `class`

Phương thức trừu tượng là phương thức được khai báo bằng từ khoá `abstract` phía trước từ khoá phạm vi (public, protected)

Các đặc điểm của Abstract Class:

- Phương thức trừu tượng chỉ được phép khai báo và không có nội dung
- Phương thức trừu tượng chỉ được phép khai báo trong lớp trừu tượng (Abstract Class)
- Trong lớp trừu tượng có thể có phương thức trừu tượng hoặc không có, nếu không phải phương thức trừu tượng thì vẫn triển khai nội dung phương thức bình thường
- Không có thuộc tính trừu tượng hay hằng số trừu tượng
- Không thể khởi tạo đối tượng từ lớp trừu tượng
- Các phạm vi trong lớp trừu tượng chỉ được khai báo là: public và protected
- Các lớp kế thừa lại lớp trừu tượng phải định nghĩa tất cả phương thức trừu tượng trong lớp trừu tượng đó

**Cú pháp lớp trừu tượng:**

```php
abstract class TenClass
{
    // noi dung
}
```

**Cú pháp phương thức trừu tượng:**

```php
abstract visibility function tenPhuongThuc();
```

**Ví dụ:**

```php
abstract class Model{
    
    abstract public function add();
    
    abstract public function update();
    
    abstract public function delete();
    
    abstract public function show();
}
```

##Interface Template

Interface trong OOP là 1 Template (khuôn mẫu) được sử dụng để tạo ra bộ khung cho các lớp

Interface giống như 1 bản hợp đồng ràng buộc và bắt buộc lớp đó phải có đầy đủ các phương thức trong hợp đồng đó (Nếu không có sẽ bị lỗi)

**Đặc điểm của Interface:**

- Interface không phải class, object. Nó là Template
- Trong Interface chỉ được phép khai báo phương thức, không được phép triển khai nội dung phương thức (Giống như Abstract Class)
- Trong Interface không được phép khai báo thuộc tính (biến) nhưng được phép khai báo hằng số
- Không thể khởi tạo đối tượng từ Interface
- Để sử dụng Interface, cần định nghĩa class và implement từ Interface đó
- Các Class implement từ Interface phải định nghĩa tất cả các phương thức trong Interface đó
- Một Class có thể implement nhiều Interface
- Các Interface có thể kế thừa lẫn nhau bằng từ khoá extends
- Phạm vi trong Interface chỉ tồn tại dạng public, không có private, protected

**Cú pháp Interface:**

```php
interface AuthInterface{
    
    const _MSG_TEMPLATE = [];
    
    public function login();
    
    public function register();
    
    public function forgotPassword();
    
    public function resetPassword();
    
    public function activeAccount();
}
```

**Cú pháp implement Interface:**

```php
class Auth implement AuthInterface{

    public function login(){
    
       //login body
       
    }
    
    public function register(){
    
       //register body
    
    }
    
    public function forgotPassword(){
    
       //forgot password body  
        
    }
    
    public function resetPassword(){
    
       //reset password body  
    
    }
    
    public function activeAccount(){
      
       //active account body
        
    }
}
```

**Cú pháp implement nhiều Interface:**

```php
class AdminAuth implement AuthInterface, RoleInterface{
    //class body
}
```

**Cú pháp các Interface kế thừa:**

```php
interface IFoo extends IBar, ArrayAccess, IteratorAggregate, Serializable{
    //Interface body
}
```

##Khi nào dùng Abstract Class - Interface Template

###Dùng Abstract Class khi:

- Chia sẻ phương thức, thuộc tính, hằng số giữa các lớp trong quan hệ kế thừa
- Muốn class này chứa các thành phần private, protected, public
- Muốn class này chứa các phương thức static, final


###Dùng Interface Template khi:

- Định nghĩa các chức năng, giá trị chung cho các lớp không có mối liên hệ với nhau
- Muốn tận dụng lợi ích của đa kế thừa
- Muốn xác định các hành vi và không quan tâm class nào sẽ thực thi

##Phương thức Magic

###Phương thức magic là gì?

- Đây là những phương thức mặc định trong OOP
- Tên của phương thức magic sẽ có 2 ký tự gạch dưới phía trước
- Phương thức magic sẽ tự động gọi dựa vào 1 số tình huống đặc biệt

###Các phương thức hay dùng

`__construct()`: Phương thức khởi tạo, chạy khi khởi tạo đối tượng mới

`__destruct()`: Phương thức huỷ, chạy khi không sử dụng đối tượng

`__get()`: Dùng để lấy dữ liệu các thuộc tính không cho phép truy cập

`__set()`: Dùng để gán dữ liệu cho các thuộc tính không cho phép truy cập

`__call()`: Phương thức này được gọi khi gọi đến 1 phương thức không tồn tại trong đối tượng

`__callStatic()`: Phương thức này được gọi khi gọi đến 1 phương thức tĩnh không tồn tại

##Trait

Traits được hỗ trợ từ phiên bản PHP 5.4, giúp giải quyết vấn đề đa kế thừa trong OOP

**Cú pháp:**

```php
trait TenTrait
{
    visibility $tenThuocTinh;
    
    visibility function tenPhuongThuc()
    {
        //Body
    }
}
```

**Sử dụng Trait:**

```php

class TenClass{
    use TenTrait1, TenTrait2;
    
    visibility function tenPhuongThuc(){
         //Body
    }
}
```

**Lưu ý khi làm việc với Trait:**

- Các thao tác vói trait giống như lớp kế thừa
- Các Trait có thể lồng nhau để giải quyết bài toán

##NameSpace

- NameSpace trong PHP giúp tạo ra định danh cho Class
- NameSpace sẽ giải quyết các trường hợp Class bị trùng nhau, Autoload Composer

**Cú pháp:**

```php
namespace TenNameSpace;
```

**Sử dụng NameSpace:**

Cách 1:

```php
$tenObject = new TenNameSpace\TenClass();
```

Cách 2:

```php
use TenNameSpace\TenClass;

$tenObject = new TenClass();
```

**Lưu ý:** 

- Khai báo NameSpace phải đặt ở đầu file PHP
- Sử dụng NameSpace bằng từ khoá `use` thường đặt ở đầu file, nếu file đó có khai báo NameSpace thì phải đặt dưới phần khai báo đó
- Trong trường hợp sử dụng `use` mà bị trùng tên Class, chúng ta cần đặt bí danh bằng cách sử dụng từ khoá `as` với cú pháp sau:

```php
use TenNameSpace\TenClass as TenClassMoi;
$tenObject = new TenClassMoi();
```

##Final Class - Final Method

Trường hợp 1: Trong trường hợp không muốn Class khác kế thừa, chúng ta cần khai báo Class đó là final

**Cú pháp Final Class:**

```php
final class TenClass{
    //body
}
```

Trường hợp 2: Trong trường hợp không muốn Class khác ghi đè phương thức, chúng ta cần khai báo phương thức đó là final

**Cú pháp Final Method:**

```php
final visibility function tenPhuongThuc(){
    //Body
}
```

##Call Multiple Method

Call Multiple Method là cách gọi các phương thức trong OOP trên 1 dòng

Kỹ thuật này bạn sẽ thường thấy trong các PHP Framework như: Laravel, Codeigniter,...

Để PHP hỗ trợ kỹ thuật này, bạn chỉ cần `return $this` tại phương thức cần gọi

```php
class DB{

    public function table($table){
    
        //Body method
        
        return $this;
    }
    
    public function where($field, $compare, $value){
        
        //Body method
        return $this;
        
    }
    
    public function select($field = '*'){
        
        //Body Method
           
        return $this;   
    }
}
```

##Xây dựng Class kết nối và tương tác với Database

- Kết nối Database
- Các thao tác CURD: Thêm, sửa, xoá, đọc (1 bản ghi, nhiều bản ghi)
- Xây dựng Class Business tương tác với Module cụ thể
- Xây dựng Class theo từng Table tương ứng