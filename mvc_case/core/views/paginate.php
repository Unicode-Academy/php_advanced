<ul class="pagination pagination-sm">
    <?php
    if ($page > 1) {
    ?>
        <li class="page-item"><a class="page-link " href="<?php echo $self::getPaginateLink($page - 1, $isQuery); ?>">Trước</a>
        </li>
    <?php } ?>
    <li class="page-item"><a class="page-link <?php echo $page == 1 ? 'active' : ''; ?>" href="<?php echo $self::getPaginateLink(1, $isQuery); ?>">1</a>
    </li>
    <?php
    if ($begin > 2) {
    ?>
        <li class="page-item">
            <span class="page-link">...</span>
        </li>
    <?php
    }
    ?>
    <?php for ($i = $begin; $i < $end; $i++) { ?>
        <li class="page-item "><a class="page-link <?php echo $page == $i ? 'active' : ''; ?>" href="<?php echo $self::getPaginateLink($i, $isQuery); ?>"><?php echo $i; ?></a>
        </li>
    <?php  } ?>
    <?php
    if ($end != $totalPage) {
    ?>
        <li class="page-item">
            <span class="page-link">...</span>
        </li>
    <?php
    }
    ?>
    <li class="page-item"><a class="page-link <?php echo $page == $totalPage ? 'active' : ''; ?>" href="<?php echo $self::getPaginateLink($totalPage, $isQuery); ?>"><?php echo $totalPage; ?></a>
    </li>
    <?php if ($page < $totalPage) { ?>
        <li class="page-item"><a class="page-link" href="<?php echo $self::getPaginateLink($page + 1, $isQuery); ?>">Sau</a>
        </li>
    <?php } ?>
</ul>