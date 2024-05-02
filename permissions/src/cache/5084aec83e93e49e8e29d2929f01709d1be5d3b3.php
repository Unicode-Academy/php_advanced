<style>
* {
    padding: 0;
    margin: 0;
}

.errors {
    text-align: center;
    background: #fff;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    line-height: 1.5;
}

.errors p {
    font-size: 1.3rem;
}
</style>
<div class="errors">
    <h1>Đã có lỗi xảy ra</h1>
    <p>Message: <?php echo e($exception->getMessage()); ?></p>
    <p>File: <?php echo e($exception->getFile()); ?> in <?php echo e($exception->getLine()); ?></p>
</div>