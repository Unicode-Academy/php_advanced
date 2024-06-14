<?php $__env->startSection('content'); ?>

<h1>Phân quyền</h1>
<?php if(can('permissions.add')): ?>
<a href="<?php echo e(url('permissions.add')); ?>" class="btn btn-primary my-2">Thêm vai trò</a>
<?php endif; ?>
<?php if(can('permissions.assign')): ?>
<a href="#users-modal" data-bs-toggle="modal" class="btn btn-primary my-2">Gán quyền</a>
<?php endif; ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <?php if(can('permissions.update')): ?>
            <th width="5%">Sửa</th>
            <?php endif; ?>
            <?php if(can('permissions.delete')): ?>
            <th width="5%">Xóa</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($role->name); ?></td>
            <?php if(can('permissions.update')): ?>
            <td>
                <a href="<?php echo e(url('permissions.edit', ['id' => $role->id])); ?>" class="btn btn-warning">Sửa</a>
            </td>
            <?php endif; ?>
            <?php if(can('permissions.delete')): ?>
            <td>
                <form method="post" action="<?php echo e(url('permissions.delete', ['id' => $role->id])); ?>" onsubmit="return confirm('Bạn có chắc chắn?')">
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo $__env->make('permissions.users', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>