<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['top_sanpham'])){
        $top_sp = '
            <div class="d-flex justify-content-between mb-2 w-100">
                <h3>Top 3 San Pham ban chay</h3>
                <select name="select_top_product" id="select_top_product" class="form-select" style="width: 8rem;height: 2.5rem;">
                            <option value="day">Day</option>
                            <option value="month">Month</option>
                </select>
            </div>
            <table class="table mx-auto">
              <thead class="bg-brown text-white">
                <tr>
                    <td>Ma SP</td>
                    <td>TEN SP</td>
                    <td>SIZE</td>
                    <td>SO LUONG</td>
                    <td>GIA</td>
                    <td>DON GIA</td>
                </tr>
              </thead>
        ';

        $sql = 'SELECT chitiethoadon_banhang.MASP, sanpham.TENSP, sanpham.SIZE, sum(chitiethoadon_banhang.SOLUONG) as so_luong, sanpham.GIA, sum(chitiethoadon_banhang.DONGIA) as don_gia, hoadonbanhang.NGAYLAPHD FROM chitiethoadon_banhang INNER JOIN hoadonbanhang ON chitiethoadon_banhang.MAHD = hoadonbanhang.MAHD INNER JOIN sanpham ON chitiethoadon_banhang.MASP = sanpham.MASP WHERE MONTH(hoadonbanhang.NGAYLAPHD) = MONTH(CURRENT_DATE()) GROUP BY chitiethoadon_banhang.MASP ORDER BY so_luong DESC LIMIT 3';
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $top_sp .= '
                <tr>
                    <td>'.$row['MASP'].'</td>
                    <td>'.$row['TENSP'].'</td>
                    <td>'.$row['SIZE'].'</td>
                    <td>'.$row['so_luong'].'</td>
                    <td>'.$row['GIA'].'</td>
                    <td>'.$row['don_gia'].'</td>
                </tr>
            ';
        }
        $top_sp .= '</table>';
        echo $top_sp;
    }

    if(isset($_GET['doanhthu'])){
        $tong = 0;
        $doanhthu = '
                <div class="d-flex justify-content-between mb-2">
                    <h3>Doanh thu</h3>
                    <select name="select_time" id="select_time" class="form-select" style="width: 8rem;height: 2.5rem;">
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                    </select>
                </div>
                <table class="table mx-auto">
                  <thead class="bg-brown text-white">
                    <tr>
                        <td>Ma SP</td>
                        <td>TEN SP</td>
                        <td>SIZE</td>
                        <td>SO LUONG</td>
                        <td>GIA</td>
                        <td>DON GIA</td>
                    </tr>
                  </thead>
            ';
        $sql = 'SELECT chitiethoadon_banhang.MASP, sanpham.TENSP, sanpham.SIZE, sum(chitiethoadon_banhang.SOLUONG) as so_luong, sanpham.GIA, sum(chitiethoadon_banhang.DONGIA) as don_gia, hoadonbanhang.NGAYLAPHD FROM chitiethoadon_banhang INNER JOIN hoadonbanhang ON chitiethoadon_banhang.MAHD = hoadonbanhang.MAHD INNER JOIN sanpham ON chitiethoadon_banhang.MASP = sanpham.MASP WHERE hoadonbanhang.NGAYLAPHD = CURRENT_DATE() GROUP BY chitiethoadon_banhang.MASP';
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $doanhthu .= '
                    <tr>
                        <td>'.$row['MASP'].'</td>
                        <td>'.$row['TENSP'].'</td>
                        <td>'.$row['SIZE'].'</td>
                        <td>'.$row['so_luong'].'</td>
                        <td>'.$row['GIA'].'</td>
                        <td>'.$row['don_gia'].'</td>
                    </tr>
                ';
            $tong += $row['don_gia'];
        }
        $doanhthu .= '</table>
                    <div class="d-flex float-end align-items-center">
                        <h4>Tong:</h4>
                        <input type="text" name="tong_doanhthu" id="tong_doanhthu" class="form-control border-0 w-50 h4" readonly>
                    </div>
                    <script>
                        $("#tong_doanhthu").val('.$tong.');
                    </script>
                    ';
        echo $doanhthu;
    }

    if(isset($_GET['doanhso'])){
        $doanhso = 0;
        $sql = "SELECT sum(chitiethoadon_banhang.DONGIA) as don_gia FROM chitiethoadon_banhang INNER JOIN hoadonbanhang ON chitiethoadon_banhang.MAHD = hoadonbanhang.MAHD WHERE MONTH(hoadonbanhang.NGAYLAPHD) = '$month_doanhso' and YEAR(hoadonbanhang.NGAYLAPHD) = YEAR(CURRENT_DATE())";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $doanhso = $row['don_gia'];
        }
        echo $doanhso;
    }
?>

