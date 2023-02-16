<?php
    include '../../configuration/connect.php';
    extract($_GET);
//    Lay danh sach nhom loai
    if(isset($_GET['nhomloai_hd'])) {
        $select_nhomloai = '<option selected value="All">All</option>';
        $sql = "SELECT DISTINCT NHOMLOAI FROM `sanpham`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $nhomloai = $row['NHOMLOAI'];
            $select_nhomloai .= '<option value="'.$nhomloai.'">'.$nhomloai.'</option>';
        }
        echo $select_nhomloai;
    }

    $script = '<script>
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
        </script>';
// Search san pham theo ma san pham
    if(isset($_GET['search_sanpham'])){
        $input = $_GET['search_sanpham'];
        $search = '';
        $sql = "SELECT * FROM `sanpham` WHERE MASP='$input'";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $search .= '
                <div id="sanpham-'.$row['MASP'].'" class="w-25">
                    <h5 class="border-bottom">'.$row['NHOMLOAI'].'</h5>
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['TENSP'].' '.$row['SIZE'].'</h5>
                            <p class="card-text">
                                '.$row['GIA'].'
                                <input id="soluong-'.$row['MASP'].'" type="number" min="1" class="form-control w-50 mx-auto" value="0">
                            </p>
                            <button class="btn btn-dark bg-brown btn-select" id="'.$row['MASP'].'-'.$row['TENSP'].'-'.$row['SIZE'].'-'.$row['GIA'].'">Select</button>
                        </div>
                    </div>
                </div>';
        }
        $search .= $script;
        echo $search;
    }
// Lay tat ca san pham
    if(isset($_GET['sanpham_all'])){
        $select_all = '';
        $sql = "SELECT DISTINCT NHOMLOAI FROM `sanpham`";
        $result = mysqli_query($con,$sql);
        $group_nhomloai = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($group_nhomloai, $row['NHOMLOAI']);
        }
        for($i = 0; $i < count($group_nhomloai); $i++){
            $select_all .= '
            <div id="'.$group_nhomloai[$i].'">
            <h5 class="border-bottom">'.$group_nhomloai[$i].'</h5>
            <div id="carousel-'.$group_nhomloai[$i].'" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel-'.$group_nhomloai[$i].'" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carousel-'.$group_nhomloai[$i].'" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carousel-'.$group_nhomloai[$i].'" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
            ';
            $sql = "SELECT * FROM `sanpham` WHERE NHOMLOAI='".$group_nhomloai[$i]."' ORDER BY SIZE DESC";
            $result = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $select_all .= '
                    <div class="carousel-item">
                        <div class="card text-center" id="sanpham-'.$row['MASP'].'">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['TENSP'].' '.$row['SIZE'].'</h5>
                                <p class="card-text">
                                    '.$row['GIA'].'
                                    <input id="soluong-'.$row['MASP'].'" type="number" min="1" class="form-control w-50 mx-auto" value="0">
                                </p>
                                <button class="btn btn-dark bg-brown btn-select" id="'.$row['MASP'].'-'.$row['TENSP'].'-'.$row['SIZE'].'-'.$row['GIA'].'">Select</button>
                            </div>
                        </div>
                    </div>';
            }
            $select_all .= '
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-'.$group_nhomloai[$i].'" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-'.$group_nhomloai[$i].'" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
            </div>
            </div>';
        }
        $select_all .= $script;
        echo $select_all;
    }
//Lay san pham theo nhom loai
    if(isset($_GET['sanpham_nhomloai']) && $_GET['sanpham_nhomloai'] != "All"){
        $sql = "SELECT * FROM `sanpham` WHERE NHOMLOAI='$sanpham_nhomloai' ORDER BY SIZE DESC";
        $result = mysqli_query($con,$sql);
        $select_sp = '
        <h5 class="border-bottom">'.$sanpham_nhomloai.'</h5>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            $select_sp .= '
                <div class="carousel-item">
                    <div class="card text-center" id="sanpham-'.$row['MASP'].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['TENSP'].' '.$row['SIZE'].'</h5>
                            <p class="card-text">
                                '.$row['GIA'].'
                                <input id="soluong-'.$row['MASP'].'" type="number" min="1" class="form-control w-50 mx-auto" value="0">
                            </p>
                            <button class="btn btn-dark bg-brown btn-select" id="'.$row['MASP'].'-'.$row['TENSP'].'-'.$row['SIZE'].'-'.$row['GIA'].'">Select</button>
                        </div>
                    </div>
                </div>';
        }
        $select_sp .= '
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>';
        $select_sp .= $script;
        echo $select_sp;
    }

// Lay diem tich luy, giam gia cua hoi vien
    if(isset($_GET['sothe_user_giam'])) {
        $sql = "SELECT * FROM `hoivien` WHERE SOTHE='$sothe_user_giam'";
        $result = mysqli_query($con,$sql);
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
        echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = 'Invalid or data not found';
    }
//Lay gia tri cua khuyen mai theo ma khuyen mai
    if(isset($_GET['makm_user_giam'])) {
        $sql = "SELECT GIATRI FROM `khuyenmai` WHERE MAKM='$makm_user_giam'";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $response = $row['GIATRI'];
        }
        echo $response;
    }
// Lay danh sach nhan vien
    if(isset($_GET['manv_user'])){
        $select_manv = '<option selected value="">Chon nhan vien</option>';
        $sql = "SELECT MANV FROM `nhanvien`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $manv = $row['MANV'];
            $select_manv .= '<option value="'.$manv.'">'.$manv.'</option>';
        }
        echo $select_manv;
    }
//  Lay danh sach hoi vien
    if(isset($_GET['hv_user'])){
        $select_hv = '<option selected value="HV00">Chon hoi vien</option>';
        $sql = "SELECT SOTHE FROM `hoivien` WHERE SOTHE != 'HV00'";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $sothe = $row['SOTHE'];
            $select_hv .= '<option value="'.$sothe.'">'.$sothe.'</option>';
        }
        echo $select_hv;
    }
//    Lay danh sach ma khuyen mai
    if(isset($_GET['makm_user'])){
        $select_makm = '<option selected value="KM00">Chon ma khuyen mai</option>';
        $sql = "SELECT MAKM FROM `khuyenmai` WHERE DATEDIFF(TGKETTHUC, CURRENT_DATE()) > 0";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $makm = $row['MAKM'];
            $select_makm .= '<option value="'.$makm.'">'.$makm.'</option>';
        }
        echo $select_makm;
    }
//    Lay danh sach ban co trang thai ON
    if(isset($_GET['maban_user'])){
        $select_maban = '<option selected value="B00">Chon ban</option>';
        $sql = "SELECT MABAN FROM `ban` WHERE TRANGTHAI=1";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $maban = $row['MABAN'];
            $select_maban .= '<option value="'.$maban.'">'.$maban.'</option>';
        }
        echo $select_maban;
    }
?>
