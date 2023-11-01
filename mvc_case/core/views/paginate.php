<ul class="pagination pagination-sm">
    <?php
    if ($page > 1) {
        ?>
    <li class="page-item"><a class="page-link"
            href="<?php echo $self::getPaginateLink($page - 1, $isQuery); ?>">Trước</a>
    </li>
    <?php }?>
    <?php for ($i = $begin; $i <= $end; $i++) { ?>
    <li class="page-item "><a class="page-link <?php echo $page == $i ? 'active' : ''; ?>"
            href="<?php echo $self::getPaginateLink($i, $isQuery); ?>"><?php echo $i; ?></a>
    </li>
    <?php  } ?>
    <?php if ($page < $totalPage) { ?>
    <li class="page-item"><a class="page-link" href="<?php echo $self::getPaginateLink($page + 1, $isQuery); ?>">Sau</a>
    </li>
    <?php }?>
</ul>