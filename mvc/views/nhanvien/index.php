<?php 
    include 'detail.php'; 
    include 'add.php';
?>
<div id="nhanvien-page">
    <h1 class="text-center text-brown">NHAN VIEN</h1>
    <div class="d-flex my-2 justify-content-between">
        <button type="button" class="bg-brown btn btn-dark" id='nhanvien-btn_add'>
            <i class="fas fa-circle-plus"></i>
            Add
        </button>         
        <div class="d-flex">
            <select class="form-select me-2" id="nhanvien-select_orderby">
                <option value="MANV">Ma nhan vien</option>
                <option value="HONV">Ho</option>
                <option value="TENNV">Ten</option>
                <option value="LUONGCA">Luong</option>
            </select>
            <div class="d-flex flex-column me-4"><i class="fa-solid fa-caret-up asc" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc" style="cursor: pointer"></i></div>
            <input type="text" class="form-control" id="nhanvien-search_input" autocomplete="off" placeholder="Search">
            <button class="bg-brown btn btn-dark" id="nhanvien-btn_search"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <div id="nhanvien-table_show"></div>

    <div class="modal fade" id="nhanvien-modal_delete" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Xoa nhan vien</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ban co muon xoa thong tin nhan vien <span class="h4 fw-bold" id="manv_delete"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="nhanvien-btn_delete">Delete</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="nhanvien-modal_deleteArr" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Xoa nhan vien</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ban co muon xoa thong tin cac nhan vien nay?</p>
                </div>
                <div class="modal-footer">
                    <button id="btn-delete_arr" class="btn btn-danger">Delete</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var text = 'MANV';
        var arr = [];
        $(document).ready(function (){
            showData();
            $('#nhanvien-search_input').on('keyup', function (e){
                e.preventDefault();
                let search_input = $('#nhanvien-search_input').val();
                if(search_input != ""){
                    $.post('/php_tur/QLBH_CF/Nhanvien/search/', {pattern: search_input}, (data) => {
                        $('#nhanvien-table_show').html(data);
                    })
                } else {
                    showData();
                }
            })
        })

        function showData(){
            orderBy(text, 'asc');
        }

        function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/Nhanvien/getList/', {text: text, filter: filter}, (data) => {
                $('#nhanvien-table_show').html(data);
            })
        }

        $('#nhanvien-select_orderby').on('change', function() {
            text = $('#nhanvien-select_orderby').val();
            orderBy(text, 'asc');
        })

        $(document).on('click','.asc',function() {
            orderBy(text, 'asc');
        })

        $(document).on('click','.desc',function() {
            orderBy(text, 'desc');
        })

        $(document).on('click','#nhanvien-btn_add',function() {
            $('#nhanvien-modal').modal('show');
            $('.modal-title').text('Them nhan vien moi');
            $('#manv-input').show();
            $('#nhanvien-form')[0].reset();
            $('#nhanvien-btn_text').text('Add');
        })

        $(document).on('click','#nhanvien-btn',function() {
            var text = 'Update';
            var manv = $('#manv_edit').text();
            if( $('#nhanvien-btn_text').text() == 'Add') {
                text = 'Add';
                manv = $('#manv').val();
            }
            $.post('/php_tur/QLBH_CF/Nhanvien/createOrUpdate/', {
                manv: manv,
                honv: $('#honv').val(),
                tennv: $('#tennv').val(),
                gioitinh: $("#nhanvien-form input[type='radio']:checked").val(),
                ngaysinh: $('#ngaysinhnv').val(),
                noisinh: $('#noisinh').val(),
                diachi: $('#diachinv').val(),
                dienthoai: $('#sdtnv').val(),
                nbddl: $('#nbdl').val(),
                scccd: $('#scccdnv').val(),
                chucvu: $('#chucvu').val(),
                luongca: $('#luongca').val()
            }, (response) => {
                console.log(response.trim())
                if(response.trim() == 'success') {
                    $('#nhanvien-modal').modal('hide');
                    $('#nhanvien-form')[0].reset();
                    showData();
                    $('#toast-text').text(text + ' successfully');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                }
            })
        });

        $(document).on('click','.btn-detail', function() {
            let id = $(this).attr('id');
            $.get('/php_tur/QLBH_CF/Nhanvien/getDetail/'+id, {}, (data) => {
                let nhanvien = JSON.parse(data);
                $('#manv_detail').val(nhanvien.MANV);
                $('#honv_detail').val(nhanvien.HONV);
                $('#tennv_detail').val(nhanvien.TENNV);
                $('#ngaysinhnv_detail').val(nhanvien.NGAYSINH);
                $('#noisinh_detail').val(nhanvien.NOISINH);
                $('#diachinv_detail').val(nhanvien.DIACHI);
                $('#sdtnv_detail').val(nhanvien.DIENTHOAI);
                $('#nbdl_detail').val(nhanvien.NGAYBDDILAM);
                $('#scccdnv_detail').val(nhanvien.SOCCCD);
                $('#chucvu_detail').val(nhanvien.CHUCVU);
                $('#luongca_detail').val(nhanvien.LUONGCA);
                if(nhanvien.GIOITINH == 1) $("#gioitinh_detail").val('Nam');
                else $("#gioitinh_detail").val('Nu');
                $('#nhanvien-modal_detail').modal('show')
                //$('#nhanvien-page').html(data)
            })

        })

        $(document).on('click','.btn-delete',function() {
            let manv_del = $(this).attr('id');
            $('#manv_delete').text(manv_del);
            $('#nhanvien-modal_delete').modal('show');
        })
        
        $('#nhanvien-btn_delete').on('click', function () { 
            let manv_del = $('#manv_delete').text();
            console.log('/php_tur/QLBH_CF/Nhanvien/destroy'+manv_del)
            $.post('/php_tur/QLBH_CF/Nhanvien/destroy/'+manv_del, {}, (data) => {
                $('#nhanvien-modal_delete').modal('hide');
                    showData();
                    $('#toast-text').text('Delete successfully');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
            })
        })

        $(document).on('click','.btn-edit',function() {
            var id = $(this).attr('id');
            $('.modal-title').html('Sua thong tin nhan vien <h4 class="fw-bold" id="manv_edit">' + id + '</h4>');
            $('#nhanvien-btn_text').text('Update');
            $('#manv-input').hide()
            $.get('/php_tur/QLBH_CF/Nhanvien/getDetail/'+id, {}, (data) => {
                let nhanvien = JSON.parse(data);
                $('#honv').val(nhanvien.HONV);
                $('#tennv').val(nhanvien.TENNV);
                $('#ngaysinhnv').val(nhanvien.NGAYSINH);
                $('#noisinh').val(nhanvien.NOISINH);
                $('#diachinv').val(nhanvien.DIACHI);
                $('#sdtnv').val(nhanvien.DIENTHOAI);
                $('#nbdl').val(nhanvien.NGAYBDDILAM);
                $('#scccdnv').val(nhanvien.SOCCCD);
                $('#chucvu').val(nhanvien.CHUCVU);
                $('#luongca').val(nhanvien.LUONGCA);
                $("#nhanvien-form input[type='radio']").val([nhanvien.GIOITINH])
                $('#nhanvien-modal').modal('show')
            })
        })

    </script>
