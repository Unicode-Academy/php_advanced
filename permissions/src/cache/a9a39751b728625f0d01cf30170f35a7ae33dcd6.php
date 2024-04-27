<?php $__env->startSection('content'); ?>
<h1>Trang chủ</h1>
<h2><?php echo e(rand(5, 10)); ?></h2>
<?php if($status): ?>
<h3><?php echo e($title); ?></h3>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>