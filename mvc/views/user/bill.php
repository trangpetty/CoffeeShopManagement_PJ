<section style="background-color: #eee;" class="py-5">
        <div class="container bg-white w-75 border py-5 rounded">
            <h1 class="text-center my-3 border-bottom" id="order-form_header">
                Phiếu gọi đồ uống
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
                        </div>
                        <div class="my-3" id="drink-search_result"></div>
                        <nav class="nav mt-3 nav-nhomloai">
                            <?php while ($row = mysqli_fetch_assoc($data['nhomloai'])) { 
                                if ($row['NHOMLOAI'] == 'Coffee') { ?>
                                    <a class="nav-link border active" id="<?php echo $row['NHOMLOAI'] ?>"><span class="h5"><?php echo $row['NHOMLOAI'] ?></span></a>
                                <?php } 
                                else {?>
                                    <a class="nav-link border" id="<?php echo $row['NHOMLOAI'] ?>"><span class="h5"><?php echo $row['NHOMLOAI'] ?></span></a>
                            <?php } }?>
                        </nav>
                        <div class="mb-3" id="drink-list_item"></div>
                    </li>
                    <li class="mb-5">
                        <h4>Hóa đơn</h4>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="manv_user" class="form-label">Mã nhân viên <span class="text-danger">*</span></label>
                                <select name="manv_user" id="manv_user" class="form-select">
                                    <?php while ($row = mysqli_fetch_assoc($data['nhanvien'])) { ?>
                                        <option value="<?php echo $row['MANV'] ?>"><?php echo $row['MANV'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error text-danger"></span>
                            </div>
                            <div class="col">
                                <label for="hv_user" class="form-label">Hội viên</label>
                                <select id="hv_user" class="form-select">
                                    <option selected value="">Chọn hội viên</option>
                                    <?php while ($row = mysqli_fetch_assoc($data['hoivien'])) { ?>
                                        <option value="<?php echo $row['SOTHE'] ?>"><?php echo $row['SOTHE'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li>
                        <h4>Danh sách sản phẩm đã chọn</h4>
                        <table class="table">
                            <thead class="bg-brown text-white">
                                <td>Mã SP</td>
                                <td>Tên SP</td>
                                <td>Size</td>
                                <td>Giá</td>
                                <td>Số lượng</td>
                                <td>Đơn giá</td>
                                <td></td>
                            </thead>
                            <tbody id="list-item_select">

                            </tbody>
                        </table>
                    </li>
                </ul>
                <div id="thanhtoan" class="border-top">
                    <div class="row ps-4">
                        <div class="col">Tổng tiền phải trả</div>
                        <div class="col"><input type="number" class="form-control border-0" value="0" id="tientra" readonly></div>
                        <div class="col">VND</div>
                    </div>
                    <div class="row ps-4">
                        <div class="col">Điểm tích lũy</div>
                        <div class="col"><input type="number" class="form-control border-0" value="0" id="diemtl_user" readonly></div>
                        <div class="col"></div>
                    </div>
                    <div class="row ps-4">
                        <div class="col">Giảm giá</div>
                        <div class="col"><input type="number" class="form-control border-0" value="0" id="giamgia_user" readonly></div>
                        <div class="col">%</div>
                    </div>
                    <div class="row ps-4">
                        <div class="col">Tổng tiền</div>
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
        var tientra = 0;
        var tongtien = 0;
        var giamgia = 0;    
        $('.toast').hide();

        $(document).ready(function () {
            $.post('/php_tur/QLBH_CF/User/nhomloaisp', {nhomloai: 'Coffee'}, (data) => {
                $('#drink-list_item').html(data)
                $('#drink-list_item').show()
            })
            //Search san pham
            $('#order-btn_search').on('click', function (){
                let sanpham = $('#search-drink').val();
                if(sanpham != ""){
                    $.post('/php_tur/QLBH_CF/User/searchSP', {masp: sanpham}, (data) => {
                        $('#drink-search_result').html(data);
                        $('#drink-search_result').show();
                        $('#drink-list_item').hide()
                    })
                }
            })
            // Select san pham theo nhom loai
            $('.nav-link').click(function() {
                $('.nav-link.active').removeClass('active');
                $(this).addClass('active')
                let select = $(this).attr('id');
                $.post('/php_tur/QLBH_CF/User/nhomloaisp', {nhomloai: select}, (data) => {
                    $('#drink-list_item').html(data)
                    $('#drink-list_item').show()
                    $('#drink-list_all').hide()
                    $('#drink-search_result').hide()
                })
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
                console.log(soluong)
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
                let html = ``;
                for(let i =0; i<list.length;i++){ 
                    html += `
                         <tr id="${list[i].masp}">
                            <td>${list[i].masp}</td>
                            <td>${list[i].tensp}</td>
                            <td>${list[i].size}</td>
                            <td>${list[i].gia}</td>
                            <td>${list[i].soluong}</td>
                            <td>${list[i].dongia}</td>
                            <td><button class="btn btn-danger" onclick="cancel('${list[i].masp}','${list[i].dongia}')"><i class="fa-solid fa-x"></i></button></td>
                         </tr>
                    `;
                }
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

        function cancel(masp, dongia) {
            $('#'+ masp).hide();
            for(let i = 0; i < list.length; i++){
                if(list[i].masp == masp && list[i].dongia == dongia){
                    list.splice(i,1);
                }
            }
            tientra -= dongia;
            $('#tientra').val(tientra);
            tongtien = tientra*((100-giamgia)/100);
            $('#tongtien_user').val(tongtien);
        }

</script>