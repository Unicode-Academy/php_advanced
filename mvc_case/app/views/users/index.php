<h3>{{$pageTitle}}</h3>
<hr>
<div class="mb-3">
    <a href="#" class="btn btn-primary">Thêm mới</a>
</div>
<form class="mb-3" action="" method="get">
    <div class="row">
        <div class="col-3">
            <select name="status" class="form-select">
                <option value="all">Tất cả trạng thái</option>
                <option value="active">Kích hoạt</option>
                <option value="inactive">Chưa kích hoạt</option>
            </select>
        </div>
        <div class="col-3">
            <select name="group_id" class="form-select">
                <option value="0">Tất cả nhóm</option>
            </select>
        </div>
        <div class="col-4">
            <input type="search" class="form-control" placeholder="Từ khóa..." />
        </div>
        <div class="col-2 d-grid">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">
                <input type="checkbox" />
            </th>
            <th>Tên</th>
            <th>Email</th>
            <th>Nhóm</th>
            <th width="15%">Trạng thái</th>
            <th width="15%">Thời gian</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        @if ($users)
        @foreach ($users as $user)
        <tr>
            <td>
                <input type="checkbox" value="{{$user['id']}}">
            </td>
            <td>
                {{$user['name']}}
            </td>
            <td>
                {{$user['email']}}
            </td>
            <td>
                {{$user['group_name']}}
            </td>
            <td>
                {! $user['status'] == 1 ? '<span class="badge bg-success">Kích hoạt</span>': '<span
                    class="badge bg-danger">Chưa kích hoạt</span>' !}
            </td>
            <td>
                {{getDateFormat($user['created_at'], "d/m/Y")}} <br />
                {{getDateFormat($user['created_at'], "H:i:s")}}
            </td>
            <td>
                <a href="{{_WEB_ROOT.'/admin/users/edit/'.$user['id']}}" class="btn btn-success btn-sm">Sửa</a>
            </td>
            <td>
                <a href="{{_WEB_ROOT.'/admin/users/delete/'.$user['id']}}" class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="row">
    <div class="col-6">
        <button class="btn btn-danger disabled">Xóa đã chọn (0)</button>
    </div>
    <div class="col-6">
        <nav class="d-flex justify-content-end">
            <ul class="pagination pagination-sm">
                <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
            </ul>
        </nav>

    </div>
</div>
