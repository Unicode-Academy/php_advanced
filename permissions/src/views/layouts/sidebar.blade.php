<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="{{ url('home') }}">Tổng quan</a></li>
    @if (can('users.read'))
        <li class="nav-item"><a class="nav-link" href="{{ url('users.index') }}">Người dùng</a></li>
    @endif
    @if (can('products.read'))
        <li class="nav-item"><a class="nav-link" href="{{ url('products.index') }}">Sản phẩm</a></li>
    @endif
    @if (can('posts.read'))
        <li class="nav-item"><a class="nav-link" href="{{ url('posts.index') }}">Bài viết</a></li>
    @endif
    @if (can('permissions.read'))
        <li class="nav-item"><a class="nav-link" href="{{ url('permissions.index') }}">Thiết lập</a></li>
    @endif
</ul>
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <span class="nav-link">Chào bạn: {{ auth()::user()->name }}</span>
    </li>
    <li class="nav-item"><a href="#" class="nav-link">Tài khoản</a></li>
    <li class="nav-item"><a href="#" onclick="event.preventDefault(); document.form_logout.submit();"
            class="nav-link">Đăng xuất</a></li>
    <form action="{{ url('auth.logout') }}" method="post" name="form_logout"></form>
</ul>
