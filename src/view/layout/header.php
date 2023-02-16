<?php
    session_start();
    if($_SESSION['role'] != 1){
        echo '<script>
                            window.location.href = "../../view/login/index.php";
                        </script>';
        echo $_SESSION['role'];
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
    <script src="../../../assets/chart.js"></script>
    <title>AJAX LESSON</title>
</head>
<body>

<!--    <div id="viewport">-->
<!--        <div id="sidebar">-->
<!--            <ui class="nav">-->
<!--                <li>-->
<!--                    <a class="nav-link active" href="../hoadon/index.php">Hoa don</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="nav-link active" href="../hoadon/index.php">Hoa don</a>-->
<!--                </li>-->
<!--            </ui>-->
<!--        </div>-->
<!---->
<!--        <div id="content">-->
<!---->
<!--        </div>-->
<!--    </div>-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 bg-brown bg-gradient">
        <div class="navbar-brand" href="">
            <i class="fa-solid fa-store text-white"></i>
            COFFE SHOP MANAGER
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link active" href="../hoadon/index.php">Hoa don</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../thongke/index.php">Thong ke</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../nhanvien/index.php">Nhan vien</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../hoivien/index.php">Hoi vien</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../sanpham/index.php">San pham</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../sochamcong/index.php">So cham cong</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../ban/index.php">Ban</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="../khuyenmai/index.php">Khuyen mai</a>
                </li>
            </ul>
        </div>
        <div class="btn btn-light" id="btn-logout">
            Logout
            <i class="fa-solid fa-right-from-bracket"></i>
        </div>
    </nav>
    <script>
        $(document).ready(function (){
            $(".navbar-nav .nav-item a").click( function (){
                $('.nav-item').removeClass('active');
                $(this).addClass('active');
            })
        })

        $("#btn-logout").click(function (){
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
        })

    </script>
