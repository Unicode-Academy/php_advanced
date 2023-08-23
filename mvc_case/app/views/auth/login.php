<h2 class="text-center">Đăng nhập hệ thống</h2>
<form action="" method="post">
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email..." />
    </div>
    <div class="mb-3">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password..." />
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </div>
    <hr>
    <p class="text-center">
        <a href="{{_WEB_ROOT.'/auth/register'}}">Đăng ký tài khoản</a>
    </p>
</form>