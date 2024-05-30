<?php $__env->startSection('content'); ?>
<div class="w-50 mx-auto">
    <form action="" method="post">
        <h2 class="text-center">Đăng nhập</h2>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email..." required>
        </div>
        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." required>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary">Đăng nhập</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>