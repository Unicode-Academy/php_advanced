$(document).ready(function() {
    $('#dataTable').DataTable();

    $('#checkAll').on('change', function(){
        if ($(this).is(':checked')){
            $('.check-item').prop('checked', true);
        }else{
            $('.check-item').prop('checked', false);
        }
    });

    //Xử lý sửa tên file - folder
    $('.edit-action').on('click', function(e){
        e.preventDefault();
        let dataJson = $(this).data('type');
        let name = dataJson.name;
        let newName = window.prompt('Tên mới', name);
        if (newName.trim()!==''){
            //submit form

            $('#form-filemanager input[name="name"]').val(newName);
            $('#form-filemanager input[name="old"]').val(name);
            $('#form-filemanager').submit();


        }else{
            alert('Vui lòng nhập tên');
        }
    });

    //Xử lý lấy link
    $('.get-link').on('click', function(e){
        e.preventDefault();
        let link = $(this).data('link');
        window.prompt('Link', link);
    });
} );








