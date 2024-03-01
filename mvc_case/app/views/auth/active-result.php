<div class="alert alert-{{$type == 'success' ? 'success': 'danger'}} text-center">
    <p>{{$message ?? ''}}</p>
    <p class="mb-0"><a href="{{_WEB_ROOT.'/auth/login'}}">Quay lại đăng nhập</a></p>
</div>