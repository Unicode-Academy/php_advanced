<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validate Form Nâng Cao</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){

    $errors = []; //Mảng lưu trữ lỗi

    //Lấy dữ liệu từ input

    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    //Validate fullname
    if (empty(trim($fullname))){
        $errors['fullname']['required'] = 'Họ và tên bắt buộc phải nhập';
    }else{
        if (!preg_match('~^[^\s][^0-9-_!@#\$%\^\(\)-\+]{4,}[^\s]$~u', $fullname)){
            $errors['fullname']['is_fullname'] = 'Họ và tên không hợp lệ';
        }
    }

    //Validate username
    if (empty(trim($username))){
        $errors['username']['required'] = 'Tên người dùng bắt buộc phải nhập';
    }else{
        if (!preg_match('~^[a-z-_][a-z-_0-9]+$~', $username)){
            $errors['username']['is_username'] = 'Tên đăng nhập không hợp lệ';
        }
    }

    //Validate email
    if (empty(trim($email))){
        $errors['email']['required'] = 'Email bắt buộc phải nhập';
    }else{
        if (!preg_match('~^[a-z]+[a-z-_\.0-9]{2,}@[a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}$~', $email)){
            $errors['email']['is_email'] = 'Email không hợp lệ';
        }
    }

    //Validate password
    if (empty(trim($password))){
        $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập';
    }else{
        if (!preg_match('~^(?=.*[A-Z].*[A-Z])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z])(?=.*[!@#\$%\^\*\(\)-\+]).{8,}$~', $password)){
            $errors['password']['is_password'] = 'Bạn đang nhập mật khẩu yếu';
        }
    }

    echo '<pre>';
    print_r($errors);
    echo '</pre>';
}
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2 class="text-center">Đăng ký tài khoản</h2>
                <hr>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Họ và tên" />
                    </div>

                    <div class="mb-3">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" />
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" />
                    </div>

                    <div class="mb-3">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" />
                    </div>

                    <p class="text-center">
                        <button type="submit" class="btn btn-primary">Đăng ký tài khoản</button>
                    </p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>