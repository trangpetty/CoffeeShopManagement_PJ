<?php 
    include '../layout/header.php';
    include 'add.php';
    include 'edit.php';
    include "detail.php";
?>
    <div class="container">
        <h1 class="text-center text-brown">NHAN VIEN</h1>
        <div class="d-flex my-2 justify-content-between">
            <button type="button" class="bg-brown btn btn-dark" data-bs-toggle="modal" data-bs-target="#nhanvien-modal_add">
                <i class="fas fa-circle-plus"></i>
                Add
            </button>
            <div class="d-flex">
                <input type="text" class="form-control" id="nhanvien-search_input" autocomplete="off" placeholder="Search">
                <button class="bg-brown btn btn-dark" id="nhanvien-btn_search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="nhanvien-search_result">

        </div>
        <div id="nhanvien-table_show">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){

            console.log($("#nhanvien-form_add input[type='radio']:checked").val());
            showData();
            $('#nhanvien-btn_search').click(function (){
                let search_input = $('#nhanvien-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/nhanvien/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#nhanvien-search_result').html(data);
                            $('#nhanvien-table_show').hide();
                        }
                    })
                } else {
                    $('#nhanvien-search_result').css('display','none');
                }
            })
        })
        function showData(){
            $.ajax({
                url: "../../controller/nhanvien/show.php",
                type: "get",
                data: {
                    nhanvien: "true"
                },
                success: function (data,status) {
                    $('#nhanvien-table_show').html(data);
                }
            });
        }
        $('#nhanvien-btn_add').on('click', function () {
            let manv = $('#manv_add').val();
            let honv = $('#honv_add').val();
            let tennv = $('#tennv_add').val();
            let gioitinh = $("#nhanvien-form_add input[type='radio']:checked").val();
            let ngaysinh = $('#ngaysinhnv_add').val();
            let noisinh = $('#noisinh_add').val();
            let diachi = $('#diachinv_add').val();
            let dienthoai = $('#sdtnv_add').val();
            let nbddl = $('#nbdl_add').val();
            let scccd = $('#scccdnv_add').val();
            let chucvu = $('#chucvu_add').val();
            let luongca = $('#luongca_add').val();

            $.ajax({
                url: "../../controller/nhanvien/insert.php",
                type: "post",
                data: {
                    manv: manv,
                    honv: honv,
                    tennv: tennv,
                    gioitinh: gioitinh,
                    ngaysinh: ngaysinh,
                    noisinh: noisinh,
                    diachi: diachi,
                    dienthoai: dienthoai,
                    nbddl: nbddl,
                    scccd: scccd,
                    chucvu: chucvu,
                    luongca: luongca
                },
                success: function (data, status){
                    $('#nhanvien-modal_add').modal('hide');
                    $('#nhanvien-form_add')[0].reset();
                    showData()
                }
            });
        });

        $(document).on('click','.btn-delete',function() {
            let manv_del = $(this).attr('id');
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/nhanvien/delete.php',
                    data: { manv_delete: manv_del},
                    success: function (data) {
                        showData()
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let manv_edit = $(this).attr('id');
            $.ajax({
                type: "post",
                url: '../../controller/nhanvien/update.php',
                data: { manv_edit: manv_edit},
                success: function (data) {
                    $.get("../../controller/nhanvien/update.php", {manv_edit: manv_edit}, function (data,status){
                        let nhanvien = JSON.parse(data);
                        $('#nhanvien-hidden-data').val(nhanvien.MANV);
                        $('#manv_edit').val(nhanvien.MANV);
                        $('#honv_edit').val(nhanvien.HONV);
                        $('#tennv_edit').val(nhanvien.TENNV);
                        if(nhanvien.GIOITINH == 1){
                            $("input:radio[name=gioitinh_edit][value=1]").click();
                        }else{
                            $("input:radio[name=gioitinh_edit][value=0]").click();
                        }
                        //$("input:radio[name=gioitinh_edit][value=nhanvien.GIOITINH]").click();
                        $('#ngaysinhnv_edit').val(nhanvien.NGAYSINH);
                        $('#noisinh_edit').val(nhanvien.NOISINH);
                        $('#diachinv_edit').val(nhanvien.DIACHI);
                        $('#sdtnv_edit').val(nhanvien.DIENTHOAI);
                        $('#nbdl_edit').val(nhanvien.NGAYBDDILAM);
                        $('#scccdnv_edit').val(nhanvien.SOCCCD);
                        $('#chucvu_edit').val(nhanvien.CHUCVU);
                        $('#luongca_edit').val(nhanvien.LUONGCA);
                    });
                }
            })
            $('#nhanvien-modal_edit').modal("show");
        })

        $(document).on('click','#nhanvien-btn_edit',function() {
            console.log($("#nhanvien-form_edit input[type='radio']:checked").val())
            $.ajax({
                type: "post",
                url: '../../controller/nhanvien/update.php',
                data: {
                    honv_update: $('#honv_edit').val(),
                    tennv_update: $('#tennv_edit').val(),
                    gioitinh_update: $("#nhanvien-form_edit input[type='radio']:checked").val(),
                    ngaysinh_update: $('#ngaysinhnv_edit').val(),
                    noisinh_update: $('#noisinh_edit').val(),
                    diachi_update: $('#diachinv_edit').val(),
                    dienthoai_update: $('#sdtnv_edit').val(),
                    nbddl_update: $('#nbdl_edit').val(),
                    scccd_update: $('#scccdnv_edit').val(),
                    chucvu_update: $('#chucvu_edit').val(),
                    luongca_update: $('#luongca_edit').val(),
                    nhanvien_hidden_data: $('#nhanvien-hidden-data').val()
                },
                success: function (data) {
                    $('#nhanvien-modal_edit').modal('hide');
                    showData();
                }
            })

        })

        $(document).on('click','.btn-detail',function() {
            let manv_detail = $(this).attr('id');
            $.ajax({
                type: "get",
                url: '../../controller/nhanvien/show.php',
                data: { manv_detail: manv_detail},
                success: function (data) {
                        let nhanvien = JSON.parse(data);
                        $('#manv_detail').val(nhanvien.MANV);
                        $('#honv_detail').val(nhanvien.HONV);
                        $('#tennv_detail').val(nhanvien.TENNV);
                        // $("#nhanvien-form_detail input[type='radio']:checked").val(nhanvien.GIOITINH);
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
                }
            })
            $('#nhanvien-modal_detail').modal("show");
        })

    </script>
<?php include '../layout/footer.php'; ?>