<h2 class="text-center">{{$pageTitle}}</h2>
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" name="name" class="form-control" placeholder="Tên..." />
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email..." />
    </div>
    <div class="mb-3">
        <label for="">Mật khẩu</label>
        <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." />
    </div>
    <div class="mb-3">
        <label for="">Nhập lại mật khẩu</label>
        <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu..." />
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </div>
    <hr>
    <p class="text-center">
        <a href="{{_WEB_ROOT.'/auth/login'}}">Đăng nhập ngay</a>
    </p>
</form>
