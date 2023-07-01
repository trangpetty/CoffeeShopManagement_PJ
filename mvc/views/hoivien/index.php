<?php 
    include 'detail.php'; 
    include 'add.php';
?>

<div id="hoivien-page">
    <h1 class="text-center text-brown">HỘI VIÊN</h1>
    <div class="d-flex my-2 justify-content-between">
        <button type="button" class="bg-brown btn btn-dark" id='hoivien-btn_add'>
            <i class="fas fa-circle-plus"></i>
            Thêm
        </button>        
        <div class="d-flex">
            <select class="form-select me-2" id="hoivien-select_orderby">
                <option value="SOTHE">Số thẻ</option>
                <option value="TENHV">Tên</option>
                <option value="DIEMTL">Điểm tích lũy</option>                
            </select>
            <div class="d-flex flex-column me-4"><i class="fa-solid fa-caret-up asc icon-arrow active" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc icon-arrow" style="cursor: pointer"></i></div>
            <input type="text" class="form-control" id="hoivien-search_input" autocomplete="off" placeholder="Số thẻ...">
            <button class="bg-brown btn btn-dark" id="hoivien-btn_search"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <div id="hoivien-table_show"></div>

    <div class="modal fade" id="hoivien-modal_delete" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Xóa hội viên</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin hội viên <span class="h4 fw-bold" id="sothe_delete"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="hoivien-btn_delete">Delete</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="toast-container bottom-0 end-50 p-3" >
<div class="toast toast-fade text-bg-success border-0 align-items-center position-fixed bottom-0" id="toast-success" role="alert" aria-live="assertive" >
    <div class="d-flex">
        <div class="toast-body">
            <i class="fa-solid fa-circle-check"></i> <span id="toast-text"></span>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

    <script>
        var text = 'SOTHE';
        var arr = [];
        $(document).on("click", '.page-item', function() {
            let page = $(this).attr("id");
            showData(page);
        })

        $(document).ready(function (){
            showData();
            $('#hoivien-search_input').on('keyup', function (e){
                e.preventDefault();
                let search_input = $('#hoivien-search_input').val();
                if(search_input != ""){
                    $.post('/php_tur/QLBH_CF/Hoivien/search/', {pattern: search_input}, (data) => {
                        $('#hoivien-table_show').html(data);
                    })
                } else {
                    showData();
                }
            })
        })

        function showData(page){
            $.post('/php_tur/QLBH_CF/Hoivien/getList/', {page: page, text: text, filter: 'asc'}, (data) => {
                $('#hoivien-table_show').html(data);
            })
        }

        function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/Hoivien/getList/', {text: text, filter: filter}, (data) => {
                $('#hoivien-table_show').html(data);
            })
        }

        $('#hoivien-select_orderby').on('change', function() {
            text = $('#hoivien-select_orderby').val();
            orderBy(text, 'asc');
        })

        $(document).on('click','.asc',function() {
            orderBy(text, 'asc');
        })

        $(document).on('click','.desc',function() {
            orderBy(text, 'desc');
        })

        $(document).on('click','#hoivien-btn_add',function() {
            $('#hoivien-modal').modal('show');
            $('.modal-title').text('Thêm hội viên mới');
            $('#sothe-input').show();
            $('#hoivien-form')[0].reset();
            $('#diemtl_add').hide();
            $('#hoivien-btn_text').text('Add');
        })

        $(document).on('click','#hoivien-btn',function() {
            var text = 'Update';
            var sothe = $('#sothe_edit').text();
            $('#diemtl_add').show();
            if( $('#hoivien-btn_text').text() == 'Add') {
                text = 'Add';
                sothe = $('#sothe').val();
            }            
            $.post('/php_tur/QLBH_CF/Hoivien/createOrUpdate/', {
                sothe: sothe,
                tenhv: $('#tenhv').val(),
                ngaysinh: $('#ngaysinhhv').val(),
                diachi: $('#diachihv').val(),
                sdt: $('#sdthv').val(),
                diemtl: $('#diemtl').val(),
                scccd: $('#scccdhv').val(),
            }, (response) => {
                if(response.trim() == 'success') {
                    $('#hoivien-modal').modal('hide');
                    $('#hoivien-form')[0].reset();
                    showData();
                    $('#toast-text').text(text + ' successfully');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                }
            })
        });

        $(document).on('click','.btn-detail', function() {
            let id = $(this).attr('id');
            $.get('/php_tur/QLBH_CF/Hoivien/getDetail/'+id, {}, (data) => {
                let hoivien = JSON.parse(data);
                $('#sothe_detail').val(hoivien.SOTHE);
                $('#tenhv_detail').val(hoivien.TENHV);                
                $('#ngaysinhhv_detail').val(hoivien.NGAYSINH);                
                $('#diachi_detail').val(hoivien.DIACHI);
                $('#dienthoai_detail').val(hoivien.DIENTHOAI);                
                $('#scccdhv_detail').val(hoivien.SOCCCD);
                $('#diemtl_detail').val(hoivien.DIEMTL);
                $('#loaihv_detail').val(hoivien.LOAIHV);                
                $('#hoivien-modal_detail').modal('show');               
            })

        })

        $(document).on('click','.btn-delete',function() {
            let sothe_del = $(this).attr('id');
            $('#sothe_delete').text(sothe_del);
            $('.modal-title').html('Xóa thông tin hội viên');
            $('#hoivien-modal_delete').modal('show');
        })
        
        $('#hoivien-btn_delete').on('click', function () { 
            let sothe_del = $('#sothe_delete').text();
            console.log('/php_tur/QLBH_CF/Hoivien/destroy'+sothe_del)
            $.post('/php_tur/QLBH_CF/Hoivien/destroy/'+sothe_del, {}, (data) => {
                $('#hoivien-modal_delete').modal('hide');
                    showData();
                    $('#toast-text').text('Delete successfully');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
            })
        })

        $(document).on('click','.btn-edit',function() {
            var id = $(this).attr('id');
            $('.modal-title').html('Sửa thông tin hội viên <h4 class="fw-bold" id="sothe_edit">' + id + '</h4>');
            $('#hoivien-btn_text').text('Update');
            $('#sothe-input').hide()
            $.get('/php_tur/QLBH_CF/Hoivien/getDetail/'+id, {}, (data) => {
                let hoivien = JSON.parse(data);
                $('#sothe').val(hoivien.SOTHE);
                $('#tenhv').val(hoivien.TENHV);                
                $('#ngaysinhhv').val(hoivien.NGAYSINH);                
                $('#diachihv').val(hoivien.DIACHI);
                $('#sdthv').val(hoivien.DIENTHOAI);                
                $('#scccdhv').val(hoivien.SOCCCD);
                $('#diemtl').val(hoivien.DIEMTL);
                $('#loaihv').val(hoivien.LOAIHV);                
                $('#hoivien-modal').modal('show');  
            })
        })

    </script>
