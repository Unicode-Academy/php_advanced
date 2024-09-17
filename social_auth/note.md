# Đăng nhập thông qua mạng xã hội

## Tổng quan

- Đa số sử dụng OAuth 2.0
- Sử dụng các thông tin trên tài khoản mạng xã hội: Google, Facebook, Github, Microsoft,...
- Sau khi có được các thông tin từ các mạng xã hội ==> Thêm vào Database của ứng dụng web ==> Tự động đăng nhập
- Tích hợp cả đăng ký, đăng nhập trong cùng 1 chức năng (Kiểm tra email có tồn tại trong Database không?)

## Các bước triển khai tích hợp

1. Chuẩn bị ứng dụng trên mạng xã hội

Các mạng xã hội đều có trang quản lý ứng dụng, bạn cần phải tạo ứng dụng trên đó để nhận được thông tin

- Client ID
- Client Secret

Sau đó bạn cần thiết lập URL trả về (Callback URL) sau khi quá trình xác thực trên mạng xã hội hoàn tất

2. Tìm hiểu cấu trúc luồng OAuth 2.0

2.1. Yêu cầu người dùng ủy quyền

- Chuyển hướng người dùng đến trang xác thực của mạng xã hội
- Mỗi mạng xã hội sẽ có URL xác thực khác nhau

==> Google: https://accounts.google.com/o/oauth2/v2/auth

==> Facebook: https://www.facebook.com/v12.0/dialog/oauth

==> Github: https://github.com/login/oauth/authorize

Code mẫu:

```php
$google_auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
    'client_id' => 'YOUR_CLIENT_ID',
    'redirect_uri' => 'http://ten_mien_cua_ban/callback.php',
    'response_type' => 'code',
    'scope' => 'email profile',
    'access_type' => 'offline',
]);
header('Location: ' . $google_auth_url);
exit;
```

2.2. Nhận mã ủy quyền (Authorization Code)

- Sau khi người dùng ủy quyền, họ sẽ được chuyển hướng về trang callback.php của bạn với mã ủy quyền trong URL.
- Bạn sẽ nhận mã này và đổi nó lấy access token từ Google.

Code mẫu

```php
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $token_url = 'https://oauth2.googleapis.com/token';
    $post_fields = [
        'code' => $code,
        'client_id' => 'YOUR_CLIENT_ID',
        'client_secret' => 'YOUR_CLIENT_SECRET',
        'redirect_uri' => 'http://yourdomain.com/callback.php',
        'grant_type' => 'authorization_code',
    ];

    // Gửi yêu cầu POST để lấy access token
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $token_info = json_decode($response, true);
    $access_token = $token_info['access_token'];
}
```

2.3. Sử dụng Access Token để lấy thông tin người dùng

Sau khi có access token, bạn có thể dùng nó để lấy thông tin người dùng từ API của mạng xã hội.

Code mẫu:

```php
$user_info_url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $access_token;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_info_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$user_info = json_decode($response, true);

// Xử lý thông tin người dùng
print_r($user_info);
```
