<?php 
    include 'add.php';
?>
<div id="sanpham-page">
    <h1 class="text-center text-brown">SẢN PHẨM</h1>
    <div class="d-flex my-2 justify-content-between">
        <button type="button" class="bg-brown btn btn-dark" id='sanpham-btn_add'>
            <i class="fas fa-circle-plus"></i>
            Thêm
        </button>      
        
        <div class="d-flex">
            <select class="form-select me-2" id="sanpham-select_orderby">
                <option value="MASP">Mã SP</option>
                <option value="TENSP">Tên SP</option>
                <option value="GIA">Giá</option>
            </select>
            <div class="d-flex flex-column me-4"><i class="fa-solid fa-caret-up asc icon-arrow active fs-5" style="cursor: pointer"></i><i class="fa-solid fa-caret-down icon-arrow desc fs-5" style="cursor: pointer"></i></div>
            <input type="text" class="form-control" id="sanpham-search_input" autocomplete="off" placeholder="Mã SP">
            <button class="bg-brown btn btn-dark" id="sanpham-btn_search"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <div id="sanpham-table_show"></div>

    <div class="modal fade" id="sanpham-modal_delete" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin sản phẩm <span class="h4 fw-bold" id="masp_delete"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="sanpham-btn_delete">Delete</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var text = 'MASP';
        var arr = [];

        $(document).on("click", '.page-item', function() {
            let page = $(this).attr("id");
            showData(page);
        })
        
        $(document).ready(function (){
            showData();
            $('#sanpham-search_input').on('keyup', function (e){
                e.preventDefault();
                let search_input = $('#sanpham-search_input').val();
                if(search_input != ""){
                    $.post('/php_tur/QLBH_CF/Sanpham/search/', {pattern: search_input}, (data) => {
                        $('#sanpham-table_show').html(data);
                    })
                } else {
                    showData();
                }
            })
        })

        function showData(page){
            $.post('/php_tur/QLBH_CF/Sanpham/getList/', {page: page, text: text, filter: 'asc'}, (data) => {
                $('#sanpham-table_show').html(data);
            })
        }

        function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/Sanpham/getList/', {text: text, filter: filter}, (data) => {
                $('#sanpham-table_show').html(data);
            })
        }

        $('#sanpham-select_orderby').on('change', function() {
            text = $('#sanpham-select_orderby').val();
            orderBy(text, 'asc');
        })

        $(document).on('click','.asc',function() {
            orderBy(text, 'asc');
        })

        $(document).on('click','.desc',function() {
            orderBy(text, 'desc');
        })

        $(document).on('click','#sanpham-btn_add',function() {
            $('#sanpham-modal').modal('show');
            $('.modal-title').text('Thêm sản phẩm mới');
            $('#masp-input').show();
            $('#sanpham-form')[0].reset();
            $('#sanpham-btn_text').text('Add');
        })

        $(document).on('click','#sanpham-btn',function() {
            var text = 'Update';  
            var masp = $('#masp_edit').text();          
            if( $('#sanpham-btn_text').text() == 'Add') {
                text = 'Add';
                masp = $('#masp').val();
            }
            $.post('/php_tur/QLBH_CF/Sanpham/createOrUpdate/', {
                masp: masp,
                tensp: $('#tensp').val(),
                gia: $('#gia').val(),                
                size: $('#size').val(),
                nhomloai: $('#nhomloai').val()                
            }, (response) => {
                console.log(response.trim())
                if(response.trim() == 'success') {
                    $('#sanpham-modal').modal('hide');
                    $('#sanpham-form')[0].reset();
                    showData();
                    $('#toast-text').text(text + ' successfully');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                }
            })
        });
        
        $(document).on('click','.btn-delete',function() {
            let manv_del = $(this).attr('id');
            $('#masp_delete').text(manv_del);
            $('.modal-title').html('Xóa thông tin sản phẩm');
            $('#sanpham-modal_delete').modal('show');
        })
        
        $('#sanpham-btn_delete').on('click', function () { 
            let manv_del = $('#masp_delete').text();
            $.post('/php_tur/QLBH_CF/Sanpham/destroy/'+manv_del, {}, (data) => {
                $('#sanpham-modal_delete').modal('hide');
                showData();
                $('#toast-text').text('Delete successfully');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
            })
        })

        $(document).on('click','.btn-edit',function() {
            var id = $(this).attr('id');
            $('.modal-title').html('Sửa thông tin sản phẩm <h4 class="fw-bold" id="masp_edit">' + id + '</h4>');
            $('#sanpham-btn_text').text('Update');
            $('#masp-input').hide()
            $.get('/php_tur/QLBH_CF/Sanpham/getDetail/'+id, {}, (data) => {
                let sanpham = JSON.parse(data);
                $('#masp').val(sanpham.MASP);
                $('#tensp').val(sanpham.TENSP);
                $('#gia').val(sanpham.GIA);
                $('#size').val(sanpham.SIZE);
                $('#nhomloai').val(sanpham.NHOMLOAI);                
                $('#sanpham-modal').modal('show')
            })
        })

    </script>
