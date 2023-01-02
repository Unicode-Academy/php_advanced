<?php
$load = new Load();

$parentDir = Load::getParentDir();

$dataScan = $load->scanDir($parentDir);

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    $old = filter_input(INPUT_POST, 'old', FILTER_SANITIZE_SPECIAL_CHARS);

    Make::rename($parentDir, $old, $name);

    redirect('?path=');
}
?>
<form action="" method="post" id="form-filemanager">
<table id="dataTable">
    <thead>
        <tr>
            <th class="text-center"><input type="checkbox" id="checkAll" /> </th>
            <th>Tên</th>
            <th>Dung lượng</th>
            <th>Cập nhật cuối</th>
            <th>Quyền</th>
            <th class="text-end">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $load->back(); //Quay lại trang trước
            if (!empty($dataScan)):

                foreach ($dataScan as $item):
                    if ($item!=='.DS_Store'):
                    $path = $load->getPath($item);

                    if ($load->isType($path)=='folder'){
                        $targetPath = '?path='.urlencode(str_replace(_DATA_DIR.'/', '', $path));
                    }else{

                       $targetPath = '?module=view_file&path='.str_replace(_DATA_DIR.'/', '', $path);
                    }

                    $dataTypeArr = [
                            'type' => $load->isType($path),
                            'name' => $item
                    ];

        ?>
        <tr>
            <td class="text-center"><input type="checkbox" class="check-item" /></td>
            <td><a href="<?php echo $targetPath; ?>"><?php echo $load->getTypeIcon($item).' '.$item; ?></a></td>
            <td><?php echo $load->getSize($item, 'KB'); ?></td>
            <td><?php echo $load->getTimeModify($item); ?></td>
            <td><?php echo $load->getPermission($item); ?></td>
            <td class="text-end">
                <?php if ($load->isType($path)=='file'): ?>
                    <a target="_blank" href="<?php echo $path; ?>" class="btn btn-primary btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <?php endif; ?>
                <a href="?module=remove_item&type=action&path=<?php echo $parentDir; ?>&filename=<?php echo urlencode($item); ?>" onclick="return confirm('Bạn có chắc chắn?');" class="btn btn-primary btn-sm mx-1"><i class="fa fa-trash" aria-hidden="true"></i>
                <a href="#" class="btn btn-primary btn-sm mx-1 edit-action" data-type='<?php echo json_encode($dataTypeArr); ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <a href="#" class="btn btn-primary btn-sm mx-1"><i class="fa fa-files-o" aria-hidden="true"></i>
                <a href="#" data-link="<?php echo getUrl(urlencode($targetPath)); ?>" class="btn btn-primary btn-sm mx-1 get-link"><i class="fa fa-link" aria-hidden="true"></i>
                </a>
                <?php if ($load->isType($path)=='file'): ?>
                    <a href="?module=download_file&path=<?php echo $path; ?>" class="btn btn-primary btn-sm mx-1"><i class="fa fa-download" aria-hidden="true"></i></a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endif; endforeach; endif; ?>
    </tbody>
</table>
    <input type="hidden" name="name" value="" />
    <input type="hidden" name="old" value="" />
</form>