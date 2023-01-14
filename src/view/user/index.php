<?php
    session_start();
    if($_SESSION['username'] == ''){
        echo '<script>
                    window.location.href = "../../view/login/index.php";
                </script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/style.css">
    <script src="../../../assets/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/jquery-3.6.1.min.js"></script>
    <title>AJAX LESSON</title>
</head>
<body>
<style>

</style>
<button class="btn btn-dark bg-brown float-end m-2" id="user-btn_logout">Log out</button>

    <section style="background-color: #eee;" class="py-5">
        <div class="container bg-white w-75 border py-5 rounded">
            <h1 class="text-center my-3 border-bottom" id="order-form_header">
                Drink Order Form
                <i class="fa-solid fa-mug-hot"></i>
            </h1>
            <div id="order-form-body" class="border-bottom">
                <ul class="p-4" id="order-list">
                    <li class="mb-5">
                        <h4>Menu</h4>
                        <div class="row">
                            <div class="col d-flex">
                                <input type="text" class="form-control" placeholder="Search drink..." id="search-drink">
                                <button class="btn btn-dark bg-brown w-25" id="order-btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col">
                                <select name="select-nhomloai" id="select-nhomloai" class="form-select"></select>
                            </div>
                        </div>
                        <div class="my-3" id="drink-search_result"></div>
                        <div class="my-3" id="drink-list_all"></div>
                        <div class="my-3" id="drink-list_item"></div>
                    </li>
                    <li class="mb-5">
                        <h4>Bill</h4>
                        <div class="row my-3">
                            <div class="col">
                                <label for="manv_user" class="form-label">Ma Nhan Vien</label>
                                <select name="manv_user" id="manv_user" class="form-select"></select>
                                <span class="error text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="hv_user" class="form-label">Hoi Vien</label>
                                <select name="hv_user" id="hv_user" class="form-select"></select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="makm_user" class="form-label">Ma Khuyen Mai</label>
                                <select name="makm_user" id="makm_user" class="form-select"></select>
                            </div>
                            <div class="col">
                                <label for="maban_user" class="form-label">Ma Ban</label>
                                <select name="maban_user" id="maban_user" class="form-select"></select>
                            </div>
                        </div>
                        <div>
                            <label for="chuthich_user" class="form-label">Chu thich</label>
                            <textarea class="form-control" rows="5" id="chuthich_user" name="chuthich_user"></textarea>
                        </div>
                    </li>

                    <li>
                        <h4>List Products Selected</h4>
                        <table class="table">
                            <thead class="bg-brown text-white">
                                <td>Ma SP</td>
                                <td>Ten SP</td>
                                <td>Size</td>
                                <td>Gia</td>
                                <td>So luong</td>
                                <td>Don gia</td>
                                <td></td>
                            </thead>
                            <tbody id="list-item_select">

                            </tbody>
                        </table>
                    </li>
                </ul>
                <div id="thanhtoan" class="border-top">
                    <div class="row ps-4">
                        <div class="col">Tong tien phai tra</div>
                        <div class="col"><input type="number" class="form-control border-0" value="0" id="tientra" readonly></div>
                        <div class="col">VND</div>
                    </div>
                    <div class="row ps-4">
                        <div class="col">Diem tich luy</div>
                        <div class="col"><input type="number" class="form-control border-0" value="0" id="diemtl_user" readonly></div>
                        <div class="col"></div>
                    </div>
                    <div class="row ps-4">
                        <div class="col">Giam gia</div>
                        <div class="col"><input type="number" class="form-control border-0" value="0" id="giamgia_user" readonly></div>
                        <div class="col">%</div>
                    </div>
                    <div class="row ps-4">
                        <div class="col">Tong tien</div>
                        <div class="col"><input type="number" class="form-control border-0" value="0" id="tongtien_user" readonly></div>
                        <div class="col">VND</div>
                    </div>
                </div>
            </div>
            <div id="order-form-footer" class="my-3 text-center">
                <button class="btn btn-dark w-25 py-3 bg-brown" id="order-btn">Order</button>
            </div>
        </div>
    </section>
<script>
        var list = [];
        var html = '';
        var tientra = 0;
        var tongtien = 0;
        var giamgia = 0;
        $(document).ready(function () {
            //Search san pham
            $('#order-btn_search').on('click', function (){
                let sanpham = $('#search-drink').val();
                if(sanpham != ""){
                    $.ajax({
                        url: '../../controller/user/show.php',
                        method: 'get',
                        data: {search_sanpham: sanpham},
                        success: function (data){
                            $('#drink-search_result').html(data);
                            $('#drink-search_result').show();
                            $('#drink-list_item').hide();
                            $('#drink-list_all').hide()
                        }
                    })
                }
            })
            //Show nhom loai san pham
            $.ajax({
                url: '../../controller/user/show.php',
                type: "get",
                data: { nhomloai_hd: "true" },
                success: function (data){
                    $('#select-nhomloai').html(data)
                }
            })
            //Show tat ca san pham
            $.ajax({
                url: '../../controller/user/show.php',
                type: "get",
                data: { sanpham_all: "true" },
                success: function (data){
                    $('#drink-list_all').html(data)
                }
            })
            //Show san pham theo nhom loai
            $('#select-nhomloai').on('change', function (){
                let select = this.value;
                if (select != 'All'){
                    $.ajax({
                        url: '../../controller/user/show.php',
                        type: "get",
                        data: { sanpham_nhomloai: select },
                        success: function (data){
                            $('#drink-list_item').html(data)
                            $('#drink-list_item').show()
                            $('#drink-list_all').hide()
                            $('#drink-search_result').hide()
                        }
                    })
                } else {
                    $('#drink-list_all').show()
                    $('#drink-list_item').hide()
                    $('#drink-search_result').hide()
                }

            })
            //Insert san pham vao chi tiet hoa don
            $(document).on('click','.btn-select',function() {
                let sanpham = $(this).attr('id');
                let sanpham_item = sanpham.split('-');
                let masp = sanpham_item[0];
                let tensp = sanpham_item[1];
                let size = sanpham_item[2];
                let gia = sanpham_item[3];
                let soluong = $('#soluong-'+ masp).val();
                let dongia = soluong*gia;
                let item = {
                    masp: masp,
                    tensp: tensp,
                    size: size,
                    gia: gia,
                    soluong: soluong,
                    dongia: dongia
                }
                list.push(item);
                // let html = ``;
                html += `
                     <tr id="${masp}">
                        <td>${masp}</td>
                        <td>${tensp}</td>
                        <td>${size}</td>
                        <td>${gia}</td>
                        <td>${soluong}</td>
                        <td>${dongia}</td>
                        <td><button class="btn btn-danger" onclick="cancel('${masp}','${dongia}')"><i class="fa-solid fa-x"></i></button></td>
                     </tr>
                `;
                $('#list-item_select').html(html);
                tientra += dongia;
                $('#tientra').val(tientra);
                tongtien = tientra*((100-giamgia)/100);
                $('#tongtien_user').val(tongtien);
            })

            //Lay danh sach ma nhan vien
            $.ajax({
                url: "../../controller/user/show.php",
                type: "get",
                data: {
                    manv_user: "true"
                },
                success: function (data) {
                    $('#manv_user').html(data);
                }
            });
            //Lay danh sach hoi vien
            $.ajax({
                url: "../../controller/user/show.php",
                type: "get",
                data: {
                    hv_user: "true"
                },
                success: function (data) {
                    $('#hv_user').html(data);
                }
            });
            //Lay danh sach ma khuyen mai
            $.ajax({
                url: "../../controller/user/show.php",
                type: "get",
                data: {
                    makm_user: "true"
                },
                success: function (data) {
                    $('#makm_user').html(data);
                }
            });
            //Lay danh sach ban
            $.ajax({
                url: "../../controller/user/show.php",
                type: "get",
                data: {
                    maban_user: "true"
                },
                success: function (data) {
                    $('#maban_user').html(data);
                }
            });
            //Lay diem tich luy va giam gia
            $('#hv_user').on('change', function () {
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
                        let diemtl = hoivien.DIEMTL;
                        if(loaihv == 'VIP1')   {giamgia += 5;}
                        else if (loaihv == 'VIP2') {giamgia += 10;}
                        else if (loaihv == 'VIP3') {giamgia += 15;}
                        $('#diemtl_user').val(diemtl);
                        $('#giamgia_user').val(giamgia);
                        tongtien = tientra*((100-giamgia)/100);
                        $('#tongtien_user').val(tongtien);
                    }
                });
            })
            //Lay giam gia khuyen mai
            $('#makm_user').on('change', function () {
                let makm =  this.value;
                $.ajax({
                    url: "../../controller/user/show.php",
                    type: "get",
                    data: {
                        makm_user_giam: makm
                    },
                    success: function (data) {
                        giamgia += parseInt(data);
                        $('#giamgia_user').val(giamgia);
                        tongtien = tientra*((100-giamgia)/100);
                        $('#tongtien_user').val(tongtien);
                    }
                });
            })

        })
        //Insert hoa don moi
        $('#order-btn').on('click', function () {
            for(i = 0; i < list.length; i++){
                if(list[i].soluong == 0) list.splice(i,1);
            }
            let manv = $('#manv_user').val();
            let sothe = $('#hv_user').val();
            let makm = $('#makm_user').val();
            let maban = $('#maban_user').val();
            let chuthich = $('#chuthich_user').val();
            if(manv != ""){
                $.ajax({
                    url: "../../controller/hoadon/insert.php",
                    type: "post",
                    data: {
                        manv_user_insert: manv,
                        sothe_user_insert: sothe,
                        giamgia_user_insert: giamgia,
                        makm_user_insert: makm,
                        maban_user_insert:maban,
                        chuthich_user_insert: chuthich
                    },
                    success: function (data, status){
                        for(i = 0; i < list.length; i++){
                            console.log(list[i].masp + ' ' + list[i].soluong + ' ' + list[i].dongia)
                            $.ajax({
                                url: "../../controller/chitiethoadon/insert.php",
                                type: "post",
                                data: {
                                    masp_user: list[i].masp,
                                    soluong_user: list[i].soluong,
                                    dongia_user: list[i].dongia
                                },
                                success: function (data, status){
                                }
                            });
                        }
                        alert('Da them hoa don mơi')
                        window.location.reload()
                    }
                });
            } else $('.error').html('<i class="fa-solid fa-circle-exclamation"></i> Nhap ma nhan vien')
        });

        $("#user-btn_logout").click(function() {
            if(confirm("Are you sure you want to logout?")){
                $.ajax({
                    url: "../../controller/login/logout.php",
                    type: "get",
                    success: ()=>{
                        alert("Logout successfully");
                        window.location.href = "../../view/login/index.php";
                    }
                });
            }
        });

        function cancel(masp, dongia) {
            $('#'+ masp).hide();
            for(let i = 0; i < list.length; i++){
                if(list[i].masp == masp){
                    list.splice(i,1);
                }
            }
            tientra -= dongia;
            $('#tientra').val(tientra);
            tongtien = tientra*((100-giamgia)/100);
            $('#tongtien_user').val(tongtien);
        }
</script>
</body>
</html>
