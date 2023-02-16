<?php
include '../layout/header.php';
include 'edit.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">HOA DON</h1>
        <div class="d-flex my-2 justify-content-between">
            <div class="d-flex">
                <input type="text" class="form-control" id="hoadon-search_input" autocomplete="off" placeholder="Search">
                <button class="btn btn-dark bg-brown" id="hoadon-btn_search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="hoadon-search_result">

        </div>
        <div id="hoadon-table_show">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        var giamgia = 0;
        $(document).ready(function (){
            showData();
            $('#hoadon-btn_search').click(function (){
                let search_input = $('#hoadon-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '../../controller/hoadon/search.php',
                        method: 'POST',
                        data: {search_input: search_input},
                        success: function (data){
                            $('#hoadon-search_result').html(data);
                            $('#hoadon-table_show').hide();
                        }
                    })
                } else {
                    $('#hoadon-search_result').css('display','none');
                }
            })
        });
        function showData(){
            $.ajax({
                url: "../../controller/hoadon/show.php",
                type: "get",
                data: {
                    hoadon: "true"
                },
                success: function (data,status) {
                    $('#hoadon-table_show').html(data);
                }
            });
        }

        $(document).on('click','.btn-delete',function() {
            let mahd_del = $(this).attr('id');
            if(confirm('Are you sure about want to delete?')){
                $.ajax({
                    type: "post",
                    url: '../../controller/hoadon/delete.php',
                    data: { mahd_delete: mahd_del},
                    success: function (data) {
                        showData()
                    }
                })
            }
        })

        $(document).on('click','.btn-edit',function() {
            let mahd_edit = $(this).attr('id');
            $('#hoadon-modal_edit').modal("show");
            $.ajax({
                type: "get",
                url: '../../controller/hoadon/update.php',
                data: { mahd_edit: mahd_edit},
                success: function (data,status){
                        let hoadon = JSON.parse(data);
                        $('#hoadon-hidden-data').val(hoadon.MAHD);
                        $('#mahd_edit').val(hoadon.MAHD);
                        $('#manvhd_edit').val(hoadon.MANV);
                        $('#sothehd_edit').val(hoadon.SOTHE);
                        $('#nlhd_edit').val(hoadon.NGAYLAPHD);
                        $('#glhd_edit').val(hoadon.GIOLAPHD);
                        $('#giamgiahd_edit').val(hoadon.GIAMGIA);
                        $('#makmhd_edit').val(hoadon.MAKM);
                        $('#mabanhd_edit').val(hoadon.MABAN);
                        $('#chuthich_edit').val(hoadon.chuthich);
                }
            })
        })

        $(document).on('click','#hoadon-btn_edit',function() {
            $.ajax({
                type: "post",
                url: '../../controller/hoadon/update.php',
                data: {
                    manvhd_update: $('#manvhd_edit').val(),
                    sothehd_update: $('#sothehd_edit').val(),
                    nlhd_update: $("#nlhd_edit").val(),
                    glhd_update: $('#glhd_edit').val(),
                    giamgia_update: $('#giamgiahd_edit').val(),
                    makmhd_update: $('#makmhd_edit').val(),
                    mabanhd_update: $('#mabanhd_edit').val(),
                    chuthich_update: $('#chuthich_edit').val(),
                    hoadon_hidden_data: $('#hoadon-hidden-data').val()
                },
                success: function (data) {
                    $('#hoadon-modal_edit').modal('hide');
                    showData();
                }
            })

        })

        $('#sothehd_edit').on('change', function () {
            let sothe =  this.value;
            $.ajax({
                url: "../../controller/user/show.php",
                type: "get",
                data: {
                    sothe_user_giam: sothe
                },
                success: function (data) {
                    let hoivien = JSON.parse(data);
                    let loaihv = hoivien.LOAIHV;
                    if(loaihv == 'VIP1')   {giamgia += 5;}
                    else if (loaihv == 'VIP2') {giamgia += 10;}
                    else if (loaihv == 'VIP3') {giamgia += 15;}
                    $('#giamgiahd_edit').val(giamgia);
                }
            });
        })
        //Lay giam gia khuyen mai
        $('#makmhd_edit').on('change', function () {
            let makm =  this.value;
            $.ajax({
                url: "../../controller/user/show.php",
                type: "get",
                data: {
                    makm_user_giam: makm
                },
                success: function (data) {
                    giamgia += parseInt(data);
                    $('#giamgiahd_edit').val(giamgia);
                }
            });
        })
    </script>
<?php include '../layout/footer.php'; ?>