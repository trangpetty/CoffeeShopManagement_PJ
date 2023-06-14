<?php 
    require_once './mvc/core/Model.php';
    class ChitietHoadon extends Model {
        protected $table = 'chitiethoadon_banhang';
        protected $fillable = ['MAHD', 'MASP', 'SOLUONG', 'DONGIA'];
        
        public function create ($masp, $soluong, $dongia) {
            $sql = "SELECT MAX(MAHD) AS MAXMAHD FROM `hoadonbanhang`";
            $result = mysqli_query($this->con,$sql);
            while ($row = mysqli_fetch_array($result)) {
                $mahd = $row['MAXMAHD'];
            }
            $sql = "call insert_chitiethoadon($mahd, '$masp', $soluong, $dongia)";
            return mysqli_query($this->con, $sql);
        }

        public function getTopSP () {
            $sql = "SELECT chitiethoadon_banhang.MASP, sanpham.TENSP, sanpham.SIZE, sum(chitiethoadon_banhang.SOLUONG) as so_luong, sanpham.GIA, sum(chitiethoadon_banhang.DONGIA) as don_gia, hoadonbanhang.NGAYLAPHD FROM chitiethoadon_banhang INNER JOIN hoadonbanhang ON chitiethoadon_banhang.MAHD = hoadonbanhang.MAHD INNER JOIN sanpham ON chitiethoadon_banhang.MASP = sanpham.MASP WHERE MONTH(hoadonbanhang.NGAYLAPHD) = MONTH(CURRENT_DATE()) GROUP BY chitiethoadon_banhang.MASP ORDER BY so_luong DESC LIMIT 3";
            return mysqli_query($this->con, $sql);
        }

        public function getDoanhthu () {
            $sql = "SELECT chitiethoadon_banhang.MASP, sanpham.TENSP, sanpham.SIZE, sum(chitiethoadon_banhang.SOLUONG) as so_luong, sanpham.GIA, sum(chitiethoadon_banhang.DONGIA) as don_gia, hoadonbanhang.NGAYLAPHD FROM chitiethoadon_banhang INNER JOIN hoadonbanhang ON chitiethoadon_banhang.MAHD = hoadonbanhang.MAHD INNER JOIN sanpham ON chitiethoadon_banhang.MASP = sanpham.MASP WHERE hoadonbanhang.NGAYLAPHD = CURRENT_DATE() GROUP BY chitiethoadon_banhang.MASP";
            return mysqli_query($this->con, $sql);
        }

        public function getDoanhso ($month) {
            $sql = "SELECT sum(chitiethoadon_banhang.DONGIA) as don_gia FROM chitiethoadon_banhang INNER JOIN hoadonbanhang ON chitiethoadon_banhang.MAHD = hoadonbanhang.MAHD WHERE MONTH(hoadonbanhang.NGAYLAPHD) = $month and YEAR(hoadonbanhang.NGAYLAPHD) = YEAR(CURRENT_DATE())";
            return mysqli_query($this->con, $sql);
        }
    }
?>