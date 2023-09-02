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
        <tr>
            <td>
                <input type="checkbox">
            </td>
            <td>
                Hoàng An
            </td>
            <td>
                hoangan.web@gmail.com
            </td>
            <td>
                Administrator
            </td>
            <td>
                <span class="badge bg-success">Kích hoạt</span>
            </td>
            <td>
                02/09/2023 <br /> 05:00:00
            </td>
            <td>
                <a href="#" class="btn btn-success btn-sm">Sửa</a>
            </td>
            <td>
                <a href="#" class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox">
            </td>
            <td>
                Hoàng An
            </td>
            <td>
                hoangan.web@gmail.com
            </td>
            <td>
                Administrator
            </td>
            <td>
                <span class="badge bg-success">Kích hoạt</span>
            </td>
            <td>
                02/09/2023 <br /> 05:00:00
            </td>
            <td>
                <a href="#" class="btn btn-success btn-sm">Sửa</a>
            </td>
            <td>
                <a href="#" class="btn btn-danger btn-sm">Xóa</a>
            </td>
        </tr>
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
