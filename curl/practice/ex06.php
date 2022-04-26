<?php
/*
 * Upload file bằng curl (Thường được dùng trong xây dựng API)
 *
 * ex06.php (form upload) => Server khác
 *
 * - file xử lý curl: Nhận file từ form upload
 * - upload.php: Nhận file từ curl và tiến hành di chuyển file vào folder uploads
 * => curl và upload.php cùng 1 server
 * */
?>
<form action="https://unicode.vn/api/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button type="submit">Upload</button>
</form>
