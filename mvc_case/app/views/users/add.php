<h3>{{$pageTitle}}</h3>
<form method="post" action="<?php echo _WEB_ROOT . '/users/store'; ?>">
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="Tên...">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email...">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu...">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu...">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Trạng thái</label>
                <select class="form-select" name="status">
                    <option value="0">Chưa kích hoạt</option>
                    <option value="1">Kích hoạt</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Nhóm</label>
                <select class="form-select" name="group_id">
                    <option value="0">Chọn nhóm</option>
                    @if ($groups)
                    @foreach ($groups as $group)
                    <option value="{{$group['id']}}">{{$group['name']}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary">Lưu</button>
            <a href="<?php echo _WEB_ROOT; ?>/users" class="btn btn-danger">Hủy</a>
        </div>
    </div>
</form>