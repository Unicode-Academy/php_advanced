<div class="modal fade" id="users-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{url('permissions.user_role')}}" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Gán quyền cho người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Người dùng</label>
                        <select name="users[]" class="d-block js-select" multiple required>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Vai trò</label>
                        @foreach ($roles as $role)
                        <label class="mb-3 d-block">
                            <input type="checkbox" name="roles[]" value="{{$role->id}}" /> {{$role->name}}
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
