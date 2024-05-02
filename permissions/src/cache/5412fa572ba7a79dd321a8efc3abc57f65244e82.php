<?php $__env->startSection('content'); ?>
<h1>Thêm bài viết</h1>
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tiêu đề</label>
        <input type="text" name="title" class="form-control" placeholder="Tiêu đề..." required />
    </div>
    <div class="mb-3">
        <label for="">Nội dung</label>
        <textarea name="content" class="form-control" placeholder="Nội dung..."></textarea>
    </div>

    <button class="btn btn-primary">Thêm mới</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>