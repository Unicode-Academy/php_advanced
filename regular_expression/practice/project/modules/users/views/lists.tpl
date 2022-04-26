<h2 style="text-align: center;">{{ $title }}</h2>
<hr>
<a href="#">Thêm user</a> <br/>

<div>
    {{$content}}
</div>

<h3>
    {{!empty($pageTitle)?$pageTitle:'Không có gì'}}
</h3>

<hr>

{{getMsg('Đăng ký thành công')}}

<ul>
    <?php

        if (!empty($listUsers)):
            foreach ($listUsers as $item):
    ?>

        <li><?php echo $item; ?></li>

    <?php
            endforeach;
        endif;
    ?>
</ul>