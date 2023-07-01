<?php 
    include 'toast.html';
    session_start();
    if($_SESSION['role'] != 1){
        echo '<script>
            window.location.href = "/php_tur/QLBH_CF";
        </script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="/php_tur/QLBH_CF/public/images/latte-art.ico">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/assets/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/assets/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="/php_tur/QLBH_CF/public/css/style.css">
    <script src="/php_tur/QLBH_CF/public/assets/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="/php_tur/QLBH_CF/public/js/jquery-3.6.1.min.js"></script>
    <script src="/php_tur/QLBH_CF/public/js/chart.js"></script>
    <title>Coffee shop</title>
</head>
<body >
    <div class="container-fluid d-flex p-0">
        <div class="row">
            <div class="d-flex flex-column justify-content-between col-auto bg-brown min-vh-100 px-4" style="width:200px">
                <div class="mt-4">
                    <a class="text-white d-none d-sm-inline text-decoration-none d-flex align-items-center ms-4" role="button">
                        <i class="fa-solid fa-store"></i>
                        <span class="fs-5"> COFFEE</span>
                        <p class="fs-5">SHOP MANAGER</p>
                    </a>
                    <hr class="text-white d-none d-sm-block">
                    <ul class="nav nav-pills flex-column mt-2 mt-sm-0" id="menu">
                        <li class="nav-item my-1">
                            <a href="/php_tur/QLBH_CF/Hoadon" class="nav-link text-white">
                                <i class="fa-solid fa-clipboard"></i>
                                <span class="ms-2 d-none d-sm-inline">Hóa đơn</span>
                            </a>                            
                        </li>
                        <li class="nav-item my-1">
                            <a href="/php_tur/QLBH_CF/Nhanvien" class="nav-link text-white">
                                <i class="fa-solid fa-clipboard-user"></i>
                                <span class="ms-2 d-none d-sm-inline">Nhân viên</span>
                            </a>
                        </li>
                        <li class="nav-item my-1">
                            <a href="/php_tur/QLBH_CF/Sochamcong" class="nav-link text-white">
                                <i class="fa-solid fa-notes-medical"></i>
                                <span class="ms-2 d-none d-sm-inline">Sổ chấm công</span>
                            </a>
                        </li>
                        <li class="nav-item my-1">
                            <a href="/php_tur/QLBH_CF/Sanpham" class="nav-link text-white">
                                <i class="fa-solid fa-mug-hot"></i>
                                <span class="ms-2 d-none d-sm-inline">Sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item my-1 disabled">                            
                            <a href="#sidemenu" data-bs-toggle="collapse" class="nav-link text-white text-white" aria-current="page">
                                <i class="fa-solid fa-chart-simple"></i>
                                <span class="ms-2 d-none d-sm-inline">Thống kê</span>                                
                                <i class="fa fa-caret-down float-end"></i>
                            </a>
                            <ul class="nav collapse ms-1 flex-column" id="sidemenu" data-bs-parent="#menu">
                                <li class="nav-item ms-4">
                                    <a href="/php_tur/QLBH_CF/Thongke" class="nav-link text-white">
                                        <i class="fa-solid fa-house"></i>
                                        <span class="ms-2 d-none d-sm-inline">Doanh thu</span>
                                    </a>                                    
                                </li>
                                <li class="nav-item ms-4">
                                    <a href="/php_tur/QLBH_CF/Thongke/getLuong" class="nav-link text-white">
                                        <i class="fa-solid fa-table"></i>
                                        <span class="ms-2 d-none d-sm-inline">Lương</span>
                                    </a>  
                                </li>
                            </ul>
                        </li>                        
                    </ul>
                </div>
                <div>
                    <div class="dropdown open">
                        <a class="btn text-white border-0 dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                    <i class="fa fa-user me-1"></i><span class="d-none d-sm-inline"><?php echo $_SESSION['username']; ?> </span>
                                </a>
                        <div class="dropdown-menu" aria-labelledby="triggerId">                            
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#account-modal_add" style="cursor:pointer">
                                <i class="fa-solid fa-user-plus"></i>   
                                Đăng ký
                            </a>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout-modal" style="cursor:pointer">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="text-link">Thoát</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="account-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đăng ký tài khoản</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="account-form_add">
                            <div class="error text-danger"></div>
                            <div class="form-group">
                                <label for="username_add">Tài khoản</label>
                                <input type="text" name="username_add" id="username_add" class="form-control">
                                <span class="text-danger my-1" id="error-username_add"></span>
                            </div>
                            <div class="form-group">
                                <label for="password_add">Mật khẩu</label>
                                <input type="password" name="password_add" id="password_add" class="form-control">
                                <span class="text-danger my-1" id="error-password_add"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="account-btn_add" style="background-color: #724e2c;">Submit</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container px-5 py-3">
            <?php require_once "./mvc/views/".$data['page'].".php"; ?>
        </div>
        <div class="modal fade" id="logout-modal" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
            <div class="modal-dialog w-75">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn thoát chương trình</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" id="btn-logout">Có</button>
                        <button class="btn btn-light" data-bs-dismiss="modal">Không</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        $(document).ready(function (){
            $(".navbar-nav .nav-item a").click( function (){
                $('.nav-item').removeClass('active');
                $(this).addClass('active');
            })
        })

        $('.icon-arrow').click(function () {
            $('.icon-arrow.active').removeClass('active');
            $(this).addClass('active');
        })

        $(document).on('click', '#btn-logout', function() {
            $.post('/php_tur/QLBH_CF/Login/logout/', {}, () => {
                $('#toast-text').text('Logout successfully');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                window.location.href = "/php_tur/QLBH_CF/";
            })
        })

        $('#account-btn_add').click(function () {
            let username = $('#username_add').val();
            let password = $('#password_add').val();
            if (username != '' && password != '') {
                $.post('/php_tur/QLBH_CF/Login/create/', {
                    username: username,
                    password: password
                }, (response) => {
                    var status =  $.trim(response);
                    if(status == '"Success"') {
                        $("#account-modal_add").modal("hide");
                        $("#account-form_add")[0].reset();
                        $('#toast-text').text('Add successfully');
                        const toastSucc = new bootstrap.Toast($('#toast-success'));
                        toastSucc.show();
                    }
                    else {
                        $('.error').html('<i class="fa-sharp fa-solid fa-circle-exclamation"></i> Tai khoan da ton tai');
                    }
                })
            } else $('.error').html('<i class="fa-solid fa-circle-exclamation"></i> Both Feilds are reqquired!!');
        })
    </script>
</body>
</html>