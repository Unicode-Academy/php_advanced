<div class="modal fade" id="users-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo e(url('permissions.user_role_permission')); ?>" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Gán quyền cho người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Người dùng</label>
                        <select name="users[]" class="d-block js-select" multiple required>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Vai trò</label>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="mb-3 d-block">
                            <input type="checkbox" class="role-item" name="roles[]" value="<?php echo e($role->id); ?>" />
                            <?php echo e($role->name); ?>

                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mb-3">
                        <label for="">Thêm quyền</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30%">Chức năng</th>
                                    <th>Quyền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($module->title); ?></td>
                                    <td>
                                        <div class="row">
                                            <?php $__currentLoopData = $module->actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-3">
                                                <label>
                                                    <input class="permission-item" type="checkbox" name="permissions[]"
                                                        value="<?php echo e($module->name.'.'.$action->name); ?>" />
                                                    <?php echo e($action->title); ?>

                                                </label>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
