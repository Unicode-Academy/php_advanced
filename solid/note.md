# Nguyên tắc SOLID trong OOP

Nguyên tắc SOLID trong lập trình hướng đối tượng là một tập hợp các nguyên tắc nhằm giúp cho code dễ bảo trì, mở rộng và giảm thiểu lỗi.

SOLID là viết tắt của 5 nguyên tắc cơ bản:

## S – Single Responsibility Principle (SRP): Nguyên tắc đơn nhiệm

Mô tả: Một class chỉ nên có một trách nhiệm duy nhất, hoặc chỉ thay đổi vì một lý do duy nhất.

Ý nghĩa: Điều này giúp giảm độ phức tạp và tăng khả năng bảo trì code. Nếu một class có nhiều trách nhiệm, việc thay đổi một phần có thể ảnh hưởng đến các phần khác.

## O – Open/Closed Principle (OCP): Nguyên tắc đóng/mở

Mô tả: Class nên mở cho việc mở rộng nhưng đóng cho việc chỉnh sửa. Tức là, bạn có thể mở rộng hành vi của class mà không cần thay đổi mã nguồn hiện tại.

Ý nghĩa: Giúp code dễ dàng mở rộng mà không ảnh hưởng đến phần code đã hoạt động ổn định, tránh việc sửa đổi gây lỗi.

## L – Liskov Substitution Principle (LSP): Nguyên tắc thay thế Liskov

Mô tả: Các đối tượng của một class con phải có thể thay thế đối tượng của class cha mà không làm thay đổi tính đúng đắn của chương trình.

Ý nghĩa: Nguyên tắc này đảm bảo tính tương thích giữa các lớp kế thừa, giúp hệ thống có thể mở rộng mà không phá vỡ logic hiện tại.

## I – Interface Segregation Principle (ISP): Nguyên tắc phân tách interface

Mô tả: Không nên buộc class phải phụ thuộc vào các interface mà nó không sử dụng. Thay vì có một interface lớn, hãy chia nhỏ chúng thành các interface chuyên biệt.

Ý nghĩa: Giúp giảm sự phụ thuộc và đảm bảo rằng mỗi class chỉ cần triển khai những chức năng mà nó thực sự cần.

## D – Dependency Inversion Principle (DIP): Nguyên tắc đảo ngược sự phụ thuộc

Mô tả: Các module cấp cao không nên phụ thuộc vào các module cấp thấp. Cả hai nên phụ thuộc vào các abstraction (interface hoặc abstract class), thay vì phụ thuộc trực tiếp vào nhau.

Ý nghĩa: Nguyên tắc này giảm sự phụ thuộc chặt chẽ giữa các module, giúp hệ thống linh hoạt hơn trong việc thay đổi và mở rộng.

Áp dụng SOLID vào phát triển phần mềm giúp code dễ hiểu, dễ bảo trì và giảm thiểu lỗi phát sinh trong quá trình phát triển sản phẩm.

# S – Single Responsibility Principle (SRP): Nguyên tắc đơn nhiệm

## Ý nghĩa:

Nguyên tắc này nhấn mạnh rằng một lớp (class) chỉ nên có một lý do duy nhất để thay đổi. Nói cách khác, mỗi lớp chỉ nên chịu trách nhiệm về một nhiệm vụ hoặc chức năng cụ thể trong hệ thống.

## Lợi ích:

- Dễ đọc và bảo trì: Khi mỗi lớp chỉ tập trung vào một nhiệm vụ, code của bạn trở nên rõ ràng và dễ hiểu hơn. Điều này giúp việc bảo trì và sửa lỗi dễ dàng hơn, đặc biệt khi làm việc trong một nhóm lớn.

- Tái sử dụng: Các lớp được thiết kế theo SRP có khả năng tái sử dụng cao hơn vì chúng không phụ thuộc vào các chức năng không liên quan.

- Giảm thiểu rủi ro: Khi thay đổi một lớp, bạn chỉ ảnh hưởng đến một phần cụ thể của hệ thống, giảm thiểu rủi ro gây ra lỗi không mong muốn ở các phần khác.

## Ví dụ thực tế:

Giả sử bạn đang xây dựng một ứng dụng quản lý nhân viên. Bạn có thể có một lớp Employee đại diện cho một nhân viên. Lớp này có thể có các thuộc tính như name, address, salary và các phương thức như calculateTax, generatePayslip.

Tuy nhiên, việc tính toán thuế và tạo phiếu lương là hai nhiệm vụ khác nhau. Nếu luật thuế thay đổi, bạn sẽ phải thay đổi lớp Employee. Tương tự, nếu định dạng phiếu lương thay đổi, bạn cũng sẽ phải thay đổi lớp này. Điều này vi phạm SRP.

Để tuân thủ SRP, bạn nên tách các nhiệm vụ này thành các lớp riêng biệt:

TaxCalculator: Chịu trách nhiệm tính toán thuế dựa trên mức lương và các quy định thuế hiện hành.

PayslipGenerator: Chịu trách nhiệm tạo phiếu lương dựa trên thông tin nhân viên và kết quả tính thuế từ TaxCalculator.

Bằng cách này, mỗi lớp chỉ có một lý do để thay đổi, làm cho code của bạn trở nên linh hoạt và dễ bảo trì hơn.

## Tóm lại

Chữ S trong SOLID nhắc nhở chúng ta về tầm quan trọng của việc phân chia trách nhiệm rõ ràng trong thiết kế phần mềm. Bằng cách áp dụng SRP, bạn có thể xây dựng các ứng dụng dễ đọc, dễ bảo trì và dễ thích ứng với thay đổi trong tương lai.

## Code mẫu

```php
<?php

// Vi phạm SRP
class User
{
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function saveToDatabase()
    {
        // Logic lưu vào cơ sở dữ liệu
    }

    public function sendWelcomeEmail()
    {
        // Logic gửi email chào mừng
    }
}

// Tuân thủ SRP
class User
{
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}

class UserRepository
{
    public function save($user)
    {
        // Logic lưu vào cơ sở dữ liệu
    }
}

class EmailService
{
    public function sendWelcomeEmail($user)
    {
        // Logic gửi email chào mừng
    }
}

// Sử dụng
$user = new User("Nguyễn Văn A", "a@example.com", "password123");

$userRepository = new UserRepository();
$userRepository->save($user);

$emailService = new EmailService();
$emailService->sendWelcomeEmail($user);
```

Vi phạm SRP: Lớp User ban đầu có nhiều hơn một trách nhiệm: lưu trữ thông tin người dùng, lưu vào cơ sở dữ liệu và gửi email chào mừng.

Tuân thủ SRP: Chúng ta tách các trách nhiệm thành các lớp riêng biệt:

User: Chỉ lưu trữ thông tin người dùng.

UserRepository: Chịu trách nhiệm tương tác với cơ sở dữ liệu để lưu và truy vấn thông tin người dùng

EmailService: Chịu trách nhiệm gửi email.

## Bài tập

Học viên hoàn thiện các bài tập dưới đây, giảng viên sẽ review code và phản hồi lại

### Bài tập 1: Tách trách nhiệm của các class

Đoạn code sau vi phạm nguyên tắc SRP. Hãy tách các trách nhiệm thành các class riêng biệt.

```php
class Invoice {
    public function calculateTotal() {
        // Logic tính toán tổng tiền
    }

    public function saveToDatabase() {
        // Logic lưu hoá đơn vào cơ sở dữ liệu
    }

    public function sendEmail() {
        // Logic gửi email thông báo
    }
}
```

Yêu cầu:

Tách logic tính toán tổng, lưu trữ vào database, và gửi email thành các class riêng biệt.

### Bài tập 2: Cải tiến chức năng lưu trữ

Bạn có một class quản lý sách, class này vừa chịu trách nhiệm lưu trữ dữ liệu sách vào file và hiển thị thông tin sách ra màn hình.

```php
class Book {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function saveToFile() {
        // Logic lưu thông tin sách vào file
    }

    public function display() {
        // Hiển thị thông tin sách
        echo "Title: " . $this->title . ", Author: " . $this->author;
    }
}
```

Yêu cầu:

Tách các chức năng lưu trữ và hiển thị ra thành các class khác để mỗi class chỉ có một trách nhiệm duy nhất.

### Bài tập 3: Hệ thống đăng ký thành viên

Bạn có một hệ thống quản lý thành viên. Trong class Member, bạn xử lý cả logic đăng ký, tính toán số năm làm thành viên, và ghi nhận thông tin vào file.

```php
class Member {
    private $name;
    private $joinDate;

    public function __construct($name, $joinDate) {
        $this->name = $name;
        $this->joinDate = $joinDate;
    }

    public function register() {
        // Logic đăng ký thành viên
    }

    public function calculateMembershipDuration() {
        // Logic tính số năm làm thành viên
    }

    public function saveToFile() {
        // Logic lưu thông tin thành viên vào file
    }
}
```

Yêu cầu:

Tách từng phần của class Member thành các class khác nhau, mỗi class chỉ thực hiện một nhiệm vụ.

### Bài tập 4: Quản lý sản phẩm

Hãy xem đoạn code dưới đây. Bạn cần tách các chức năng quản lý sản phẩm thành các class riêng biệt.

```php
class Product {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function calculateDiscount($discountRate) {
        return $this->price - ($this->price * $discountRate);
    }

    public function generateInvoice() {
        // Logic tạo hoá đơn
    }

    public function saveToDatabase() {
        // Logic lưu thông tin sản phẩm vào cơ sở dữ liệu
    }
}
```

Yêu cầu:

Tách các chức năng tính giảm giá, tạo hoá đơn và lưu vào cơ sở dữ liệu thành các class riêng biệt.

# O – Open/Closed Principle (OCP): Nguyên tắc đóng/mở

Nguyên tắc O trong SOLID là Nguyên tắc Đóng/Mở (Open/Closed Principle). Nguyên tắc này khuyến khích thiết kế các thực thể phần mềm (lớp, module, hàm, v.v.) theo cách mà chúng:

Mở để mở rộng: Có thể dễ dàng thêm các chức năng hoặc hành vi mới vào thực thể mà không cần thay đổi mã nguồn hiện có.

Đóng để sửa đổi: Mã nguồn hiện có của thực thể không nên bị thay đổi khi thêm các chức năng mới.

## Lợi ích của việc tuân theo nguyên tắc O:

Dễ bảo trì: Khi thêm các chức năng mới, bạn không cần phải sửa đổi mã hiện có, do đó giảm thiểu rủi ro gây ra lỗi trong các phần khác của hệ thống.

Dễ tái sử dụng: Các thực thể được thiết kế theo nguyên tắc O có xu hướng linh hoạt hơn và có thể được sử dụng lại trong các ngữ cảnh khác nhau mà không cần sửa đổi nhiều.

Kiểm thử dễ dàng hơn: Vì mã hiện có không bị thay đổi khi thêm chức năng mới, bạn chỉ cần tập trung kiểm thử phần mã mới được thêm vào.

## Cách áp dụng nguyên tắc O:

Sử dụng tính trừu tượng: Tạo các lớp trừu tượng hoặc giao diện để xác định hành vi chung. Các lớp cụ thể có thể kế thừa hoặc triển khai các lớp trừu tượng này để cung cấp các chức năng cụ thể.

Sử dụng kế thừa: Tạo các lớp con kế thừa từ các lớp cha để mở rộng chức năng mà không cần sửa đổi lớp cha.

Sử dụng kỹ thuật thiết kế như Strategy Pattern hoặc Decorator Pattern: Các mẫu thiết kế này cho phép bạn thêm hành vi mới vào một đối tượng một cách linh hoạt mà không cần thay đổi lớp của đối tượng đó.

## Ví dụ:

Giả sử bạn có một lớp Hình dạng để tính toán diện tích của các hình khác nhau. Nếu bạn muốn thêm một hình mới, chẳng hạn như hình tam giác, bạn có thể:

- Cách tiếp cận không tốt (vi phạm nguyên tắc O): Sửa đổi lớp Hình dạng để thêm một phương thức mới để tính toán diện tích của hình tam giác. Điều này vi phạm nguyên tắc O vì bạn đang sửa đổi mã hiện có.

- Cách tiếp cận tốt (tuân theo nguyên tắc O): Tạo một lớp con mới HìnhTamGiác kế thừa từ lớp Hình dạng và triển khai phương thức tính diện tích cho hình tam giác. Bằng cách này, bạn đang mở rộng chức năng mà không cần sửa đổi lớp Hình dạng hiện có.

## Code mẫu

```php
<?php

// Định nghĩa interface cho các phương thức xác thực
interface AuthenticationProvider {
    public function authenticate($username, $password);
}

// Các lớp cụ thể triển khai interface AuthenticationProvider
class DatabaseAuthProvider implements AuthenticationProvider {
    public function authenticate($username, $password) {
        // Logic để kiểm tra thông tin đăng nhập từ cơ sở dữ liệu
        // ...
    }
}

class LDAPAuthProvider implements AuthenticationProvider {
    public function authenticate($username, $password) {
        // Logic để kiểm tra thông tin đăng nhập từ LDAP server
        // ...
    }
}

// Lớp xử lý đăng nhập
class LoginHandler {
    private $authProvider;

    public function __construct($authProvider) {
        $this->authProvider = $authProvider;
    }

    public function handleLogin($username, $password) {
        if ($this->authProvider->authenticate($username, $password)) {
            // Đăng nhập thành công
            // ...
        } else {
            // Đăng nhập thất bại
            // ...
        }
    }
}

// Sử dụng
// Giả sử người dùng chọn đăng nhập bằng LDAP
$authProvider = new LDAPAuthProvider();
$loginHandler = new LoginHandler($authProvider);
$loginHandler->handleLogin('username', 'password');
```

### Giải thích:

Interface AuthenticationProvider: Xác định hành vi chung (authenticate) mà tất cả các phương thức xác thực phải triển khai.

Các lớp DatabaseAuthProvider, LDAPAuthProvider: Triển khai interface AuthenticationProvider, cung cấp cách xác thực cụ thể cho từng nguồn dữ liệu (cơ sở dữ liệu, LDAP).

Lớp LoginHandler: Xử lý quá trình đăng nhập, sử dụng một đối tượng AuthenticationProvider để thực hiện xác thực.

Mở rộng: Nếu bạn muốn thêm một phương thức xác thực mới (ví dụ: xác thực qua OAuth, Single Sign-On), bạn chỉ cần tạo một lớp mới triển khai AuthenticationProvider mà không cần sửa đổi các lớp hiện có.

Điều này thể hiện nguyên tắc Open/Closed: mở để mở rộng (thêm phương thức xác thực mới), đóng để sửa đổi (không cần sửa các lớp cũ).

### Lợi ích:

Dễ dàng bảo trì và mở rộng: Khi có yêu cầu thêm phương thức xác thực mới, bạn chỉ cần thêm lớp mới mà không ảnh hưởng đến code hiện có.

Linh hoạt: Bạn có thể dễ dàng thay đổi phương thức xác thực mà không cần thay đổi nhiều code.

Kiểm thử dễ dàng hơn: Bạn có thể viết các unit test riêng biệt cho từng lớp AuthenticationProvider.

## Bài tập

Học viên hoàn thiện các bài tập dưới đây, giảng viên sẽ review code và phản hồi lại

### Bài tập 1: Tính Tiền Cho Các Loại Hóa Đơn Khác Nhau

Mô tả: Bạn có một hệ thống tính tiền cho các loại hóa đơn (hoá đơn mua hàng, hoá đơn dịch vụ). Ban đầu, hệ thống chỉ hỗ trợ tính tiền cho hóa đơn mua hàng. Bạn cần mở rộng chức năng để tính tiền cho hóa đơn dịch vụ mà không sửa đổi logic cũ.

Yêu cầu:

Tạo class InvoiceCalculator có phương thức tính tiền cho hóa đơn mua hàng.

Mở rộng hệ thống để hỗ trợ hóa đơn dịch vụ (ví dụ: tính thêm phí dịch vụ) mà không chỉnh sửa InvoiceCalculator.

Gợi ý: Sử dụng lớp trừu tượng hoặc giao diện Invoice và các lớp con cụ thể ProductInvoice và ServiceInvoice.

### Bài tập 2: Hệ Thống Gửi Thông Báo Đa Kênh

Mô tả: Bạn có một hệ thống gửi thông báo qua email. Giờ đây, bạn muốn mở rộng hệ thống để gửi thông báo qua SMS mà không sửa đổi logic gửi email hiện có.

Yêu cầu:

Tạo class NotificationSender với phương thức gửi thông báo qua email.

Mở rộng hệ thống để hỗ trợ gửi SMS bằng cách áp dụng nguyên tắc OCP.

Gợi ý: Tạo giao diện NotificationMethod và các lớp con như EmailNotification, SMSNotification.

### Bài tập 3: Tính Chi Phí Vận Chuyển Đa Quốc Gia

Mô tả: Hệ thống hiện tại chỉ hỗ trợ tính chi phí vận chuyển cho các đơn hàng nội địa. Bạn cần mở rộng hệ thống để tính chi phí vận chuyển quốc tế mà không sửa đổi logic cũ.

Yêu cầu:

Tạo class ShippingCostCalculator với logic tính chi phí vận chuyển nội địa.

Mở rộng để tính chi phí cho vận chuyển quốc tế mà không làm thay đổi ShippingCostCalculator.

Gợi ý: Tạo interface ShippingMethod với các lớp cụ thể như DomesticShipping và InternationalShipping.

### Bài tập 4: Tính Thuế Cho Sản Phẩm

Mô tả: Hệ thống hiện tại chỉ hỗ trợ tính thuế cho sản phẩm thông thường. Bạn cần mở rộng hệ thống để tính thuế cho sản phẩm điện tử với mức thuế đặc biệt mà không sửa đổi mã nguồn hiện có.

Yêu cầu:

Tạo class TaxCalculator với phương thức tính thuế cho sản phẩm thông thường.
Mở rộng hệ thống để tính thuế cho sản phẩm điện tử mà không sửa đổi TaxCalculator.

Gợi ý: Tạo interface TaxableProduct và các lớp con RegularProduct và ElectronicProduct.

### Bài tập 5: Hệ Thống Giảm Giá Sản Phẩm

Mô tả: Hệ thống hiện tại chỉ hỗ trợ giảm giá cố định cho sản phẩm. Bạn muốn mở rộng hệ thống để hỗ trợ nhiều loại giảm giá khác nhau, như giảm giá theo phần trăm hoặc giảm giá theo số tiền cố định.

Yêu cầu:

Tạo class DiscountCalculator để tính giảm giá cố định.

Mở rộng hệ thống để hỗ trợ giảm giá phần trăm mà không sửa đổi logic hiện có.

Gợi ý: Sử dụng interface DiscountStrategy và các lớp con như FixedDiscount và PercentageDiscount.

# L – Liskov Substitution Principle (LSP): Nguyên tắc thay thế Liskov

Liskov Substitution Principle (LSP) là nguyên tắc thứ ba trong bộ nguyên tắc SOLID, được phát biểu bởi nhà khoa học máy tính Barbara Liskov. Nguyên tắc này nói rằng:

"Một lớp con có thể thay thế lớp cha mà không làm thay đổi tính đúng đắn của chương trình."

Nói cách khác, nếu một lớp con kế thừa từ lớp cha, thì bạn nên có khả năng sử dụng lớp con này thay cho lớp cha mà không gây ra lỗi hoặc hành vi bất ngờ trong chương trình.

## Ví dụ

Giả sử bạn có lớp Bird và lớp con Penguin. Theo LSP, Penguin nên có khả năng thay thế Bird trong tất cả các ngữ cảnh mà Bird được sử dụng, mà không làm hỏng tính đúng đắn của chương trình. Tuy nhiên, nếu bạn có phương thức fly() trong lớp Bird, điều này sẽ không hợp lý cho lớp Penguin vì chim cánh cụt không thể bay.

Điều này vi phạm nguyên tắc LSP vì Penguin không thể hoàn toàn thay thế Bird do không thể thực hiện phương thức fly().

## Để tuân theo LSP:

Các lớp con cần thực hiện đúng chức năng như lớp cha mà không thay đổi mục đích ban đầu của lớp cha.

Tránh việc lớp con thay đổi hành vi của lớp cha theo hướng mà người dùng không lường trước được.

```php
class Bird {
    public function eat() {
        // Logic ăn của loài chim
    }
}

class Penguin extends Bird {
    public function swim() {
        // Logic bơi của chim cánh cụt
    }
}
```

Trong ví dụ này, Penguin vẫn giữ chức năng của lớp cha Bird (ví dụ, eat()), đồng thời thêm các hành vi đặc biệt khác mà không làm thay đổi mục đích của lớp cha.

## Mục đích của LSP

Giúp tăng tính linh hoạt của hệ thống.

Đảm bảo tính dễ bảo trì khi có sự thay thế các lớp con trong chương trình mà không làm thay đổi chức năng chính của nó.

## Code mẫu

```php
<?php

interface Storage {
    public function storeData($data);
    public function retrieveData();
}

class DatabaseStorage implements Storage {
    public function storeData($data) {
        // Logic lưu dữ liệu vào cơ sở dữ liệu
        echo "Lưu dữ liệu vào cơ sở dữ liệu: $data\n";
    }

    public function retrieveData() {
        // Logic lấy dữ liệu từ cơ sở dữ liệu
        $data = "Dữ liệu từ cơ sở dữ liệu";
        echo "Lấy dữ liệu từ cơ sở dữ liệu: $data\n";
        return $data;
    }
}

class SessionStorage implements Storage {
    public function storeData($data) {
        // Logic lưu dữ liệu vào session
        $_SESSION['data'] = $data;
        echo "Lưu dữ liệu vào session: $data\n";
    }

    public function retrieveData() {
        // Logic lấy dữ liệu từ session
        $data = $_SESSION['data'];
        echo "Lấy dữ liệu từ session: $data\n";
        return $data;
    }
}

function processData($storage) {
    $data = "Một số dữ liệu";
    $storage->storeData($data);
    $retrievedData = $storage->retrieveData();
    // Xử lý dữ liệu đã lấy được
    echo "Xử lý dữ liệu: $retrievedData\n";
}

$databaseStorage = new DatabaseStorage();
processData($databaseStorage);

$sessionStorage = new SessionStorage();
processData($sessionStorage);
```

### Tuân thủ nguyên tắc L:

Trong ví dụ này, cả hai lớp DatabaseStorage và SessionStorage đều thực hiện giao diện Storage.

Điều này có nghĩa là chúng có thể được sử dụng thay thế cho nhau trong hàm processData() mà không gây ra lỗi.

Hàm processData() chỉ quan tâm đến việc lưu trữ và truy xuất dữ liệu, không quan tâm đến việc dữ liệu được lưu trữ ở đâu (cơ sở dữ liệu hay session).

### Lợi ích:

Việc tuân thủ nguyên tắc L trong ví dụ này mang lại một số lợi ích:

Dễ dàng thay đổi cách lưu trữ dữ liệu: Nếu sau này bạn muốn chuyển từ lưu trữ dữ liệu trong cơ sở dữ liệu sang lưu trữ trong session (hoặc ngược lại), bạn chỉ cần thay đổi cách khởi tạo đối tượng Storage mà không cần phải sửa đổi hàm processData().

Dễ dàng kiểm thử: Bạn có thể dễ dàng viết các unit test cho hàm processData() bằng cách truyền vào các đối tượng Storage khác nhau (ví dụ: một đối tượng giả lập để kiểm tra các trường hợp cụ thể).

Code dễ đọc và bảo trì hơn: Việc sử dụng giao diện và tuân thủ nguyên tắc L giúp code trở nên rõ ràng hơn và dễ hiểu hơn, từ đó dễ dàng bảo trì và mở rộng hơn.

## Bài tập

Học viên hoàn thiện các bài tập sau để giảng viên review code và phản hồi lại

### Bài tập 1: Phân tích vi phạm nguyên tắc Liskov

Cho đoạn code sau:

````php
class Rectangle {
    protected $width;
    protected $height;

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle {
    public function setWidth($width) {
        $this->width = $width;
        $this->height = $width; // Cập nhật cả chiều cao để đảm bảo là hình vuông
    }

    public function setHeight($height) {
        $this->height = $height;
        $this->width = $height; // Cập nhật cả chiều rộng để đảm bảo là hình vuông
    }
}

$rectangle = new Rectangle();
$rectangle->setWidth(5);
$rectangle->setHeight(10);
echo "Rectangle Area: " . $rectangle->getArea(); // Kết quả: 50

$square = new Square();
$square->setWidth(5);
$square->setHeight(10);
echo "Square Area: " . $square->getArea(); // Kết quả: ?```
````

Câu hỏi:

Đoạn code trên có vi phạm nguyên tắc Liskov không? Nếu có, hãy giải thích lý do.

Làm cách nào để sửa code trên để tuân thủ nguyên tắc Liskov?

### Bài tập 2: Thực hiện nguyên tắc Liskov

Hãy tạo một chương trình để quản lý các phương tiện giao thông. Giả sử rằng bạn có một lớp cơ bản Vehicle với các phương thức như startEngine, stopEngine, và accelerate.

Tạo các lớp con như Car, Bicycle, và Airplane, mỗi lớp có cách hoạt động khác nhau.

Yêu cầu:

Các lớp con phải tuân thủ nguyên tắc Liskov, nghĩa là khi thay thế lớp Vehicle bằng các lớp con, chương trình vẫn hoạt động đúng.

Mô phỏng việc gọi các phương thức của Vehicle và đảm bảo rằng mỗi lớp con hoạt động chính xác.

## Bài tập 3: Sửa lỗi vi phạm nguyên tắc Liskov

Cho đoạn code sau:

```php
class Bird {
    public function fly() {
        return "Bird is flying";
    }
}

class Penguin extends Bird {
    public function fly() {
        throw new Exception("Penguins cannot fly");
    }
}
```

Câu hỏi:

Đoạn code trên có vi phạm nguyên tắc Liskov không? Giải thích tại sao.

Hãy viết lại code để đảm bảo rằng lớp Penguin vẫn tuân thủ nguyên tắc Liskov mà không gây lỗi.

## Bài tập 4: Thiết kế hệ thống

Giả sử bạn đang phát triển một hệ thống quản lý nhân viên cho một công ty.

Công ty có các loại nhân viên: nhân viên chính thức và nhân viên hợp đồng. Nhân viên chính thức có quyền lợi bảo hiểm, trong khi nhân viên hợp đồng không có.

Yêu cầu:

Tạo lớp cha Employee và các lớp con FullTimeEmployee và ContractEmployee.

Đảm bảo rằng các lớp con có thể thay thế lớp cha trong các tình huống mà không gây ra vấn đề về logic (tuân thủ nguyên tắc Liskov).

# I – Interface Segregation Principle (ISP): Nguyên tắc phân tách interface

Nguyên tắc phân tách giao diện (ISP) phát biểu rằng:

"Không nên ép một client (lớp hoặc module) phải phụ thuộc vào các interface mà nó không sử dụng"

Nói cách khác, thay vì có một interface lớn chứa nhiều phương thức, nên chia nhỏ thành nhiều interface nhỏ hơn, mỗi interface tập trung vào một nhóm chức năng cụ thể.

Việc tuân thủ nguyên tắc này giúp:

- Tránh "ô nhiễm" interface: Các client chỉ cần implement các interface liên quan đến chức năng mà chúng thực sự cần, tránh việc phải implement các phương thức không cần thiết.

- Tăng tính linh hoạt: Việc thay đổi hoặc thêm các interface mới sẽ ít ảnh hưởng đến các client hiện có.

- Dễ bảo trì: Các interface nhỏ hơn thường dễ hiểu và dễ quản lý hơn so với một interface lớn.

## Code mẫu

```php
interface Worker {
    public function work();
    public function eat();
    public function sleep();
}

class Human implements Worker {
    public function work() {
        // ...
    }

    public function eat() {
        // ...
    }

    public function sleep() {
        // ...
    }
}

class Robot implements Worker {
    public function work() {
        // ...
    }

    // Robot không ăn và ngủ
    public function eat() {
        // Không làm gì
    }

    public function sleep() {
        // Không làm gì
    }
}
```

Trong ví dụ này, interface Worker chứa các phương thức work, eat và sleep. Điều này ổn đối với lớp Human vì con người cần làm cả ba việc này.

Tuy nhiên, lớp Robot chỉ cần làm việc, không cần ăn và ngủ. Việc implement các phương thức eat và sleep trong lớp Robot là không cần thiết và vi phạm ISP.

Tuân thủ ISP

```php
interface Workable {
    public function work();
}

interface Eatable {
    public function eat();
}

interface Sleepable {
    public function sleep();
}

class Human implements Workable, Eatable, Sleepable {
    // ...
}

class Robot implements Workable {
    // ...
}
```

Trong ví dụ này, chúng ta đã chia nhỏ interface Worker thành ba interface nhỏ hơn: Workable, Eatable và Sleepable.

Giờ đây, lớp Human implement cả ba interface, trong khi lớp Robot chỉ cần implement interface Workable. Điều này tuân thủ ISP và tránh việc "ô nhiễm" interface.

Lưu ý: Việc áp dụng ISP có thể làm tăng số lượng interface trong hệ thống, nhưng đổi lại, nó mang lại nhiều lợi ích về tính linh hoạt, dễ bảo trì và tránh các phụ thuộc không cần thiết.

## Bài tập

Học viên hoàn thiện các bài tập dưới đây, giảng viên sẽ review code và phản hồi lại

### Bài tập 1: Hệ thống xử lý thanh toán

Bạn đang xây dựng một hệ thống thanh toán cho website bán hàng, hiện có giao diện PaymentGateway như sau:

```php
interface PaymentGateway {
    public function processCreditCard($amount);
    public function processPaypal($amount);
    public function processBitcoin($amount);
}
```

Yêu cầu:

- Áp dụng nguyên tắc Interface Segregation để tách PaymentGateway thành nhiều giao diện nhỏ, mỗi giao diện chỉ xử lý một phương thức thanh toán.

- Tạo các class CreditCardPayment, PaypalPayment, và BitcoinPayment để triển khai từng giao diện.

### Bài tập 2: Hệ thống thông báo trong web application

Một ứng dụng web có nhiều loại thông báo khác nhau (Email, SMS, Push Notification).

Hiện tại, hệ thống đang sử dụng giao diện Notifier:

```php
interface Notifier {
    public function sendEmail($recipient, $message);
    public function sendSMS($recipient, $message);
    public function sendPushNotification($recipient, $message);
}
```

Yêu cầu:

- Áp dụng nguyên tắc Interface Segregation để tách giao diện Notifier thành các giao diện riêng biệt cho từng loại thông báo.

- Viết các class EmailNotifier, SMSNotifier, và PushNotifier để triển khai các giao diện tương ứng.

### Bài tập 3: Quản lý người dùng trong hệ thống web

Giả sử bạn có một hệ thống quản lý người dùng cho một ứng dụng web với giao diện UserManager:

```php
interface UserManager {
    public function createUser($userData);
    public function deleteUser($userId);
    public function banUser($userId);
    public function sendEmailToUser($userId, $message);
}
```

Yêu cầu:

- Áp dụng nguyên tắc Interface Segregation để chia giao diện UserManager thành các giao diện nhỏ hơn, mỗi giao diện có một mục đích rõ ràng (quản lý tài khoản, gửi email, quản lý cấm tài khoản).

- Xây dựng các class như AccountManager, EmailService, và BanManager để triển khai các giao diện mới.

### Bài tập 4: Hệ thống tải file lên

Một hệ thống web cho phép người dùng tải file lên từ nhiều nguồn khác nhau, và hiện tại có một giao diện FileUploader:

```php
interface FileUploader {
    public function uploadFromLocal($file);
    public function uploadFromURL($url);
    public function uploadFromCloud($cloudFile);
}
```

Yêu cầu:

- Tách giao diện FileUploader thành các giao diện nhỏ hơn dựa trên từng phương thức tải file.

- Tạo các class như LocalFileUploader, URLFileUploader, và CloudFileUploader để triển khai các giao diện riêng biệt.

### Bài tập 5: Quản lý sản phẩm trên website

Một website bán hàng có giao diện ProductManager để quản lý sản phẩm, hiện tại giao diện này quá lớn:

```php
interface ProductManager {
    public function createProduct($productData);
    public function updateProduct($productId, $productData);
    public function deleteProduct($productId);
    public function addDiscount($productId, $discount);
    public function removeDiscount($productId);
    public function generateProductReport();
}
```

Yêu cầu:

- Áp dụng nguyên tắc Interface Segregation để tách ProductManager thành các giao diện riêng biệt cho từng nhóm chức năng (quản lý sản phẩm, quản lý giảm giá, báo cáo sản phẩm).

- Xây dựng các class ProductService, DiscountService, và ProductReportService để triển khai các giao diện mới.

# D – Dependency Inversion Principle (DIP): Nguyên tắc đảo ngược sự phụ thuộc

## Nguyên tắc này có hai phần chính:

1. Các module cấp cao không nên phụ thuộc vào các module cấp thấp. Cả hai nên phụ thuộc vào các abstraction (lớp trừu tượng).

- Module cấp cao (high-level) thường là những phần quan trọng, chứa logic nghiệp vụ chính của ứng dụng.
- Module cấp thấp (low-level) là những module triển khai chi tiết, thường là những dịch vụ, thành phần giao tiếp với hệ thống như cơ sở dữ liệu, API, hoặc các thư viện khác.
- Việc phụ thuộc trực tiếp vào module cấp thấp có thể gây khó khăn khi cần thay đổi, do đó cả hai nên phụ thuộc vào một abstraction (interface hoặc lớp trừu tượng).

2. Abstraction không nên phụ thuộc vào chi tiết cụ thể. Chi tiết cụ thể nên phụ thuộc vào abstraction.

- Điều này có nghĩa là các interface, lớp trừu tượng không được biết về chi tiết cụ thể của các lớp triển khai, mà các lớp triển khai cần thực hiện theo các abstraction.

## Code mẫu

Trong một ứng dụng PHP, giả sử bạn có một class OrderService để xử lý các đơn hàng và một class EmailService để gửi email thông báo khi đơn hàng được tạo. Nếu OrderService phụ thuộc trực tiếp vào EmailService, điều này vi phạm nguyên tắc Dependency Inversion.

Vi phạm nguyên tắc D:

```php
class EmailService {
    public function send($message) {
        // Logic gửi email
    }
}

class OrderService {
    private $emailService;

    public function __construct() {
        $this->emailService = new EmailService();
    }

    public function createOrder() {
        // Logic tạo đơn hàng
        $this->emailService->send("Order created");
    }
}
```

Ở đây, OrderService phụ thuộc trực tiếp vào EmailService. Nếu bạn muốn thay đổi cách gửi thông báo (ví dụ, thay vì email thì gửi qua SMS), bạn sẽ phải chỉnh sửa code của OrderService.

Tuân thủ nguyên tắc D:

```php
interface NotificationServiceInterface {
    public function send($message);
}

class EmailService implements NotificationServiceInterface {
    public function send($message) {
        // Logic gửi email
    }
}

class OrderService {
    private $notificationService;

    public function __construct($notificationService) {
        $this->notificationService = $notificationService;
    }

    public function createOrder() {
        // Logic tạo đơn hàng
        $this->notificationService->send("Order created");
    }
}

$emailService = new EmailService();
$orderService = new OrderService($emailService);
$orderService->createOrder();
```

Bây giờ, OrderService phụ thuộc vào NotificationServiceInterface (abstraction) thay vì EmailService (chi tiết cụ thể). Bạn có thể dễ dàng thay thế EmailService bằng một class khác, chẳng hạn như SMSService, mà không cần thay đổi code của OrderService.

Nguyên tắc này giúp code dễ dàng mở rộng và bảo trì hơn khi bạn muốn thay đổi cách triển khai chi tiết mà không ảnh hưởng đến toàn bộ hệ thống.

## Bài tập

### Bài tập 1: Thiết kế giao diện giao tiếp với cơ sở dữ liệu

Mô tả: Bạn có một hệ thống cần tương tác với nhiều loại cơ sở dữ liệu khác nhau (MySQL, PostgreSQL, MongoDB). Hãy thiết kế một hệ thống với các lớp tương tác với cơ sở dữ liệu mà không phụ thuộc trực tiếp vào các lớp cụ thể cho từng loại cơ sở dữ liệu.

Yêu cầu:

- Tạo một interface DatabaseConnection chứa các phương thức cần thiết để thực hiện các thao tác với cơ sở dữ liệu.

- Tạo các lớp cụ thể như MySQLConnection, PostgreSQLConnection, và MongoDBConnection để implement interface này.

- Module cấp cao (ví dụ: UserService) không được phụ thuộc trực tiếp vào bất kỳ lớp cụ thể nào, chỉ phụ thuộc vào DatabaseConnection.

### Bài tập 2: Mô phỏng thanh toán trong hệ thống thương mại điện tử

Mô tả: Hệ thống của bạn cần xử lý thanh toán qua nhiều cổng thanh toán như PayPal, Stripe, và chuyển khoản ngân hàng.

Yêu cầu:

- Tạo một interface PaymentGateway định nghĩa các phương thức thanh toán.

- Tạo các lớp cụ thể PayPalGateway, StripeGateway, và BankTransferGateway để thực
  hiện các phương thức của interface PaymentGateway.

- Xây dựng một module quản lý thanh toán PaymentManager chỉ phụ thuộc vào PaymentGateway, không biết cụ thể nó sẽ dùng cổng thanh toán nào.

### Bài tập 3: Xây dựng hệ thống kiểm tra lỗi

Mô tả: Bạn cần xây dựng một hệ thống kiểm tra lỗi có thể ghi nhận lỗi qua các phương thức khác nhau (ghi vào file, gửi qua email, hoặc ghi vào console).

Yêu cầu:

- Tạo một interface Logger với các phương thức để ghi nhận lỗi.

- Implement các lớp cụ thể như FileLogger, EmailLogger, và ConsoleLogger dựa trên interface này.

- Xây dựng một hệ thống kiểm tra lỗi mà không phụ thuộc vào các lớp cụ thể, chỉ phụ thuộc vào interface Logger.

### Bài tập 4: Xây dựng hệ thống xuất báo cáo

Mô tả: Bạn cần phát triển một hệ thống có khả năng xuất báo cáo dưới nhiều định dạng khác nhau như PDF, Excel, và CSV.

Yêu cầu:

- Tạo một interface ReportGenerator chứa các phương thức để xuất báo cáo.

- Tạo các lớp cụ thể PDFReportGenerator, ExcelReportGenerator, và CSVReportGenerator để implement interface này.

- Tạo một lớp ReportManager chịu trách nhiệm xử lý dữ liệu và xuất báo cáo. Lớp này chỉ phụ thuộc vào ReportGenerator, không phụ thuộc vào các lớp cụ thể.

### Bài tập 5: Hệ thống quản lý chi phí trong doanh nghiệp

Mô tả: Một hệ thống phần mềm kế toán đang được sử dụng để xử lý các giao dịch tài chính.

Hiện tại, hệ thống đang trực tiếp sử dụng các dịch vụ như tính toán thuế, lưu trữ báo cáo và gửi email mà không thông qua lớp trung gian (abstraction).

Điều này làm cho hệ thống phụ thuộc mạnh vào các lớp cụ thể và khó thay đổi khi có yêu cầu sử dụng các dịch vụ khác.

Yêu cầu:

- Tạo interface ExpenseService với các phương thức để ghi nhận và xử lý chi phí.

- Tạo các lớp cụ thể OperationalExpenseService, HRExpenseService, và MarketingExpenseService để implement interface ExpenseService.

- Xây dựng một lớp ExpenseManager để quản lý các loại chi phí, lớp này chỉ làm việc với ExpenseService mà không phụ thuộc vào các lớp cụ thể.

### Gợi ý chung

Trong mỗi bài tập, hãy chú trọng vào việc tách các phần phụ thuộc thông qua interface (hoặc abstraction), và module cấp cao chỉ làm việc với abstraction, không làm việc trực tiếp với lớp cụ thể.
