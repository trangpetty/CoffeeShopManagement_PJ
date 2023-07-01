<?php 
    include 'add.php';
?>
<div id="sochamcong-page">
    <h1 class="text-center text-brown">SỔ CHẤM CÔNG</h1>
    <div class="d-flex my-2 justify-content-between">
        <button type="button" class="bg-brown btn btn-dark"  data-bs-target="#sochamcong-modal" data-bs-toggle="modal">
            <i class="fas fa-circle-plus"></i>
            Thêm
        </button>
        
        <div class="d-flex">
            <select class="form-select me-2" id="sochamcong-select_orderby">
                <option value="MANV">Mã NV</option>
                <option value="CALAM">Ca làm</option>
                <option value="NGAYDILAM">Ngày làm</option>                
            </select>
            <div class="d-flex flex-column me-4"><i class="fa-solid fa-caret-up asc icon-arrow active" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc icon-arrow" style="cursor: pointer"></i></div>
            <input type="text" class="form-control" id="sochamcong-search_input" autocomplete="off" placeholder="Mã NV">
            <button class="bg-brown btn btn-dark" id="sochamcong-btn_search"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <div id="sochamcong-table_show"></div>

    <div class="modal fade" id="sochamcong-modal_delete" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa công <span class="h4 fw-bold" id="scc_delete"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="sochamcong-btn_delete">Delete</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var text = 'NGAYDILAM';
        var arr = [];
        $(document).on("click", '.page-item', function() {
            let page = $(this).attr("id");
            showData(page);
        })
        
        $(document).ready(function (){
            showData();
            $('#sochamcong-search_input').on('keyup', function (e){
                e.preventDefault();
                let search_input = $('#sochamcong-search_input').val();
                if(search_input != ""){
                    $.post('/php_tur/QLBH_CF/sochamcong/search/', {pattern: search_input}, (data) => {
                        $('#sochamcong-table_show').html(data);
                    })
                } else {
                    showData();
                }
            })
        })

        function showData(page){
            $.post('/php_tur/QLBH_CF/Sochamcong/getList/', {page: page, text: text, filter: 'asc'}, (data) => {
                $('#sochamcong-table_show').html(data);
            })
        }

        function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/Sochamcong/getList/', {text: text, filter: filter}, (data) => {
                $('#sochamcong-table_show').html(data);
            })
        }

        $('#sochamcong-select_orderby').on('change', function() {
            text = $('#sochamcong-select_orderby').val();
            orderBy(text, 'asc');
        })

        $(document).on('click','.asc',function() {
            orderBy(text, 'asc');
        })

        $(document).on('click','.desc',function() {
            orderBy(text, 'desc');
        })

        $(document).on('click','#sochamcong-btn',function() {            
            $.post('/php_tur/QLBH_CF/Sochamcong/create/', {
                manv: $('#manv').val(),
                ngaydilam: $('#ngaydilam').val(),
                calam: $('#calam').val()
            }, (response) => {                
                if(response.trim() == 'success') {
                    $('#sochamcong-modal').modal('hide');
                    $('#sochamcong-form')[0].reset();
                    showData();
                    $('#toast-text').text(text + ' successfully');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                }
                else $('#text-err').html("Công đã tồn tại");
                 
            })
        });

        $(document).on('click','.btn-delete',function() {
            let manv_del = $(this).attr('id');
            $('#scc_delete').text(manv_del.split('/')[0] + " ngày " + manv_del.split('/')[2] + " ca " + manv_del.split('/')[1]);
            $('#sochamcong-modal_delete').modal('show');
        })
        
        $('#sochamcong-btn_delete').on('click', function () { 
            let manv = $('#scc_delete').text().split('/')[0];
            let ngaydilam = $('#scc_delete').text().split('/')[2];
            let calam = $('#scc_delete').text().split('/')[1];
            console.log(manv, ngaydilam, calam)
            $.post('/php_tur/QLBH_CF/Sochamcong/destroy/', {
                manv: manv,
                ngaydilam: ngaydilam,
                calam: calam
            }, (data) => {
                $('#sochamcong-modal_delete').modal('hide');
                showData();
                $('#toast-text').text('Delete successfully');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
            })
        })

    </script>
