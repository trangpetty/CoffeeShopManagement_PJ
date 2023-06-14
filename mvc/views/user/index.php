<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/assets/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/assets/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/css/style.css">
    <script src="/php_tur/QLBH_CF/public/assets/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="/php_tur/QLBH_CF/public/js/jquery-3.6.1.min.js"></script>
    <script src="/php_tur/QLBH_CF/public/js/main.js"></script>
    <title>AJAX LESSON</title>
</head>
<body>
    <button class="btn btn-dark bg-brown float-end m-2" data-bs-toggle="modal" data-bs-target="#logout-modal">Log out</button>
    <div class="modal fade" id="logout-modal" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thong bao</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ban muon thoat chuong trinh?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="btn-logout">Yes</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

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
                                <select name="select-nhomloai" id="select-nhomloai" class="form-select">
                                    <option selected value="All">All</option>
                                    <?php while ($row = mysqli_fetch_assoc($data['nhomloai'])) { ?>
                                        <option value="<?php echo $row['NHOMLOAI'] ?>"><?php echo $row['NHOMLOAI'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="my-3" id="drink-search_result"></div>
                        <div class="my-3" id="drink-list_all">
                            <?php for($i = 0; $i < count($data['group_nhomloai']); $i++){ ?>
                                <div id="<?php echo $data['group_nhomloai'][$i]?>">
                                <h5 class="border-bottom"><?php echo $data['group_nhomloai'][$i]?></h5>
                                <div id="carousel-<?php echo $data['group_nhomloai'][$i]?>" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carousel-<?php echo $data['group_nhomloai'][$i]?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carousel-<?php echo $data['group_nhomloai'][$i]?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carousel-<?php echo $data['group_nhomloai'][$i]?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                    <?php for($j = 0; $j < count($data['group_item'][$i]); $j++){ ?>
                                        <div class="carousel-item">
                                        <div class="card text-center" id="sanpham-<?php echo $data['group_item'][$i][$j]['MASP']?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $data['group_item'][$i][$j]['TENSP'].' '.$data['group_item'][$i][$j]['SIZE']?></h5>
                                                <p class="card-text">
                                                    <?php echo $data['group_item'][$i][$j]['GIA']?>
                                                    <input id="soluong-<?php echo $data['group_item'][$i][$j]['MASP']?>" type="number" min="1" class="form-control w-50 mx-auto" value="0">
                                                </p>
                                                <button class="btn btn-dark bg-brown btn-select" id="<?php echo $data['group_item'][$i][$j]['MASP'].'-'.$data['group_item'][$i][$j]['TENSP'].'-'.$data['group_item'][$i][$j]['SIZE'].'-'.$data['group_item'][$i][$j]['GIA']?>">Select</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $data['group_nhomloai'][$i]?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $data['group_nhomloai'][$i]?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                               <?php } ?>
                        </div>
                        <div class="my-3" id="drink-list_item"></div>
                    </li>
                    <li class="mb-5">
                        <h4>Bill</h4>
                        <div class="row my-3">
                            <div class="col">
                                <label for="manv_user" class="form-label">Ma Nhan Vien</label>
                                <select name="manv_user" id="manv_user" class="form-select">
                                    <option selected value="">Chon nhan vien</option>
                                    <?php while ($row = mysqli_fetch_assoc($data['nhanvien'])) { ?>
                                        <option value="<?php echo $row['MANV'] ?>"><?php echo $row['MANV'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="hv_user" class="form-label">Hoi Vien</label>
                                <select id="hv_user" class="form-select">
                                    <option selected value="">Chon hoi vien</option>
                                    <?php while ($row = mysqli_fetch_assoc($data['hoivien'])) { ?>
                                        <option value="<?php echo $row['SOTHE'] ?>"><?php echo $row['SOTHE'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
        <div class="toast toast-fade text-bg-success border-0 align-items-center float-end" id="toast-success" role="alert" aria-live="assertive">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fa-solid fa-circle-check"></i> <span id="toast-text"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </section>

<script>
        var list = [];
        var html = '';
        var tientra = 0;
        var tongtien = 0;
        var giamgia = 0;    
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $(".carousel-control-next").on("click", function(){
            if(scrollPosition < (carouselWidth - (cardWidth * 4))){
                scrollPosition = scrollPosition + cardWidth;
                $(".carousel-inner").animate({scrollLeft: scrollPosition},600);
            }
        });
        $(".carousel-control-prev").on("click", function(){
            if(scrollPosition > 0){
                scrollPosition = scrollPosition - cardWidth;
                $(".carousel-inner").animate({scrollLeft: scrollPosition},600);
            }
        });

        $('.toast').hide();

        $(document).ready(function () {
            //Search san pham
            $('#order-btn_search').on('click', function (){
                let sanpham = $('#search-drink').val();
                if(sanpham != ""){
                    $.post('/php_tur/QLBH_CF/User/searchSP', {masp: sanpham}, (data) => {
                        $('#drink-search_result').html(data);
                        $('#drink-search_result').show();
                        $('#drink-list_item').hide();
                        $('#drink-list_all').hide()
                    })
                }
            })
            //Show san pham theo nhom loai
            $('#select-nhomloai').on('change', function (){
                let select = this.value;
                if (select != 'All'){
                    $.post('/php_tur/QLBH_CF/User/nhomloaisp', {nhomloai: select}, (data) => {
                        $('#drink-list_item').html(data)
                        $('#drink-list_item').show()
                        $('#drink-list_all').hide()
                        $('#drink-search_result').hide()
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

            $('#hv_user').on('change', function () {
                let sothe =  this.value;
                $.post('/php_tur/QLBH_CF/User/getHV', {sothe: sothe}, (data) => {
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
                })
            })
        })

        //Insert hoa don moi
        $('#order-btn').on('click', function () {
            let manv = $('#manv_user').val()
            for(i = 0; i < list.length; i++){
                if(list[i].soluong == 0) list.splice(i,1);
            }
            if(manv != ""){
                $.post('/php_tur/QLBH_CF/Hoadon/create', {
                    manv: manv,
                    sothe: $('#hv_user').val(),
                    giamgia: giamgia,
                    chuthich: $('#chuthich_user').val()
                }, (response) => {
                    for(i = 0; i < list.length; i++){
                        console.log(list[i].masp + ' ' + list[i].soluong + ' ' + list[i].dongia)
                        $.post('/php_tur/QLBH_CF/Hoadon/createCTHD', {
                            masp: list[i].masp,
                            soluong: list[i].soluong,
                            dongia: list[i].dongia
                            }, () => {
                            })
                    }
                    $('#toast-text').text('Da them hoa don moi');
                    $('.toast').show();
                    setInterval(() => {
                        $('.toast').hide();                                              
                        window.location.reload()
                    }, 2000);
                    
                })
            } else $('.error').html('<i class="fa-solid fa-circle-exclamation"></i> Nhap ma nhan vien')
        });

        $(document).on('click', '#btn-logout', function() {
            $.post('/php_tur/QLBH_CF/Login/logout/', {}, () => {
                window.location.href = "/php_tur/QLBH_CF/";
            })
        })


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
