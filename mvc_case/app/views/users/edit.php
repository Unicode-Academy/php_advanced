<h3>{{$pageTitle}}</h3>
<form method="post" action="<?php echo _WEB_ROOT . '/users/update/' . $id; ?>">
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="Tên..." value="{{old('name', $user['name'])}}">
                {! form_error('name', '<span class="text-danger">', '</span>') !}
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email..." value="{{old('email', $user['email'])}}">
                {! form_error('email', '<span class="text-danger">', '</span>') !}
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu...">
                {! form_error('password', '<span class="text-danger">', '</span>') !}
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu...">
                {! form_error('confirm_password', '<span class="text-danger">', '</span>') !}
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Trạng thái</label>
                <select class="form-select" name="status">
                    <option value="0" {{old('status', $user['status']) == 0 ? 'selected': ''}}>Chưa kích hoạt</option>
                    <option value="1" {{old('status', $user['status']) == 1 ? 'selected': ''}}>Kích hoạt</option>
                </select>
                {! form_error('status', '<span class="text-danger">', '</span>') !}
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Nhóm</label>
                <select class="form-select" name="group_id">
                    <option value="0">Chọn nhóm</option>
                    @if ($groups)
                    @foreach ($groups as $group)
                    <option value="{{$group['id']}}" {{old('group_id', $user['group_id']) == $group['id'] ? 'selected': ''}}>
                        {{$group['name']}}
                    </option>
                    @endforeach
                    @endif
                </select>
                {! form_error('group_id', '<span class="text-danger">', '</span>') !}
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary">Lưu</button>
            <a href="<?php echo _WEB_ROOT; ?>/users" class="btn btn-danger">Hủy</a>
        </div>
    </div>
</form>