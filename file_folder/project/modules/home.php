<?php
$load = new Load();
$dataScan = $load->scanDir();
?>
<table id="dataTable">
    <thead>
        <tr>
            <th class="text-center"><input type="checkbox" id="checkAll" /> </th>
            <th>Tên</th>
            <th>Dung lượng</th>
            <th>Cập nhật cuối</th>
            <th>Quyền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (!empty($dataScan)):
                foreach ($dataScan as $item):
                    $path = $load->getPath($item);
        ?>
        <tr>
            <td class="text-center"><input type="checkbox" class="check-item" /></td>
            <td><a href="?path=<?php echo $path; ?>"><?php echo $load->getTypeIcon($item).' '.$item; ?></a></td>
            <td><?php echo $load->getSize($item, 'KB'); ?></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>