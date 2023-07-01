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
    <script src="/php_tur/QLBH_CF/public/js/main.js"></script>
    <title>Coffee shop</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-brown">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between w-100" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item my-1">
                <a href="/php_tur/QLBH_CF/User" class="nav-link text-white">
                    <i class="fa-solid fa-clipboard"></i>
                    <span class="ms-2 d-none d-sm-inline">Lập hóa đơn</span>
                </a>
            </li>
            <li class="nav-item my-1">
                <a href="/php_tur/QLBH_CF/Hoivien" class="nav-link text-white">
                    <i class="fa-solid fa-users"></i>
                    <span class="ms-2 d-none d-sm-inline">Hội viên</span>
                </a>
            </li>
        </ul>
        <div class="d-flex align-items-center">
            <span class="text-white">
                Hello, nv01
            </span>
            <button class="btn btn-dark bg-brown float-end m-2" data-bs-toggle="modal" data-bs-target="#logout-modal">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Log out
            </button>
        </div>
    </div>
  </div>
</nav>
    <div class="modal fade" id="logout-modal" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Thông báo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn muốn thoát chương trình</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="btn-logout">Có</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Không</button>
                </div>
            </div>
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
    <div class="container px-5 py-3">
        <?php require_once "./mvc/views/".$data['page'].".php"; ?>
    </div>
    <script>
        $(document).on('click', '#btn-logout', function() {
            $.post('/php_tur/QLBH_CF/Login/logout/', {}, () => {
                $('#toast-text').text('Logout successfully');
                const toastSucc = new bootstrap.Toast($('#toast-success'));
                toastSucc.show();
                window.location.href = "/php_tur/QLBH_CF/";
            })
        })
    </script>
</body>
</html>
