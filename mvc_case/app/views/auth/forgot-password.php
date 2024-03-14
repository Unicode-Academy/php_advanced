<h2 class="text-center">Lấy lại mật khẩu</h2>
<form action="{{_WEB_ROOT.'/auth/do-forgot-password'}}" method="post">
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email..." value="{{old('email')}}" />
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </div>
    <hr>
    <p class="text-center">
        <a href="{{_WEB_ROOT.'/auth/login'}}">Đăng nhập</a>
    </p>

</form>