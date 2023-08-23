<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/css/style.css">
</head>

<body>
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-5">
                <?php $this->render($body, $dataView)?>
            </div>
        </div>
    </div>
</body>

</html>