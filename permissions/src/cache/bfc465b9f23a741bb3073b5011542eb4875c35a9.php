<?php $__env->startSection('content'); ?>
<h1>Vai trò</h1>
<a href="<?php echo e(url('permissions.add')); ?>" class="btn btn-primary my-2">Thêm vai trò</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($role->name); ?></td>
            <td>
                <a href="#" class="btn btn-warning">Sửa</a>
            </td>
            <td>
                <a href="#" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>