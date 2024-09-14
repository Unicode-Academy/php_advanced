<?php $__env->startSection('content'); ?>
    <h1>Quản lý bài viết</h1>
    <?php if(can('posts.add')): ?>
        <a href="<?php echo e(url('posts.add')); ?>" class="btn btn-primary my-2">Thêm mới</a>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tiêu đề</th>
                <?php if(auth()::user()->is_root == 1 || can('posts.read_all')): ?>
                    <th>Người đăng</th>
                <?php endif; ?>
                <?php if(can('posts.update')): ?>
                    <th width="5%">Sửa</th>
                <?php endif; ?>
                <?php if(can('posts.delete')): ?>
                    <th width="5%">Xóa</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($post->title); ?></td>
                    <?php if(auth()::user()->is_root == 1 || can('posts.read_all')): ?>
                        <td><?php echo e($post->user_name); ?></td>
                    <?php endif; ?>
                    <?php if(can('posts.update')): ?>
                        <td><a href="<?php echo e(url('posts.edit', ['id' => $post->id])); ?>" class="btn btn-warning btn-sm">Sửa</a></td>
                    <?php endif; ?>
                    <?php if(can('posts.delete')): ?>
                        <td>
                            <form method="post" onsubmit="return confirm('Bạn có chắc chắn?')"
                                action="<?php echo e(url('posts.delete', ['id' => $post->id])); ?>">
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>