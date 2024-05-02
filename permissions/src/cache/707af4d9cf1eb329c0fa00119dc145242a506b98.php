<?php $__env->startSection('content'); ?>
<h1>Quản lý sản phẩm</h1>
<a href="<?php echo e(url('products.add')); ?>" class="btn btn-primary my-2">Thêm mới</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th>Giá</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->price ? number_format($product->price): 0); ?></td>

            <td><a href="<?php echo e(url('products.edit', ['id' => $product->id])); ?>" class="btn btn-warning btn-sm">Sửa</a></td>
            <td>
                <form method="post" onsubmit="return confirm('Bạn có chắc chắn?')"
                    action="<?php echo e(url('products.delete', ['id' => $product->id])); ?>">
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>