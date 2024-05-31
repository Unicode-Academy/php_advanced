<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="<?php echo e(url('home')); ?>">Tổng quan</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo e(url('users.index')); ?>">Người dùng</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo e(url('products.index')); ?>">Sản phẩm</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo e(url('posts.index')); ?>">Bài viết</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo e(url('permissions.index')); ?>">Thiết lập</a></li>
</ul>
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <span class="nav-link">Chào bạn: <?php echo e(auth()::user()->name); ?></span>
    </li>
    <li class="nav-item"><a href="#" class="nav-link">Tài khoản</a></li>
    <li class="nav-item"><a href="#" onclick="event.preventDefault(); document.form_logout.submit();" class="nav-link">Đăng xuất</a></li>
    <form action="<?php echo e(url('auth.logout')); ?>" method="post" name="form_logout"></form>
</ul>