<?php 
    require_once './mvc/core/Model.php';
    class Sochamcong extends Model {
        protected $table = 'sochamcong';
        //protected $fillable = ['MAHD', 'MANV', 'SOTHE', 'NGAYLAPHD', 'GIOLAPHD', 'GIAMGIA', 'MAKM', 'MABAN', 'CHUTHICH' ];
        
        public function create($manv, $ngaydilam, $calam) {
            $check = "SELECT * FROM sochamcong WHERE MANV = '$manv' AND NGAYDILAM = '$ngaydilam' AND CALAM = '$calam'";
            $result = mysqli_query($this->con, $check);
            $sql = "INSERT INTO sochamcong VALUES('$manv', '$ngaydilam', '$calam')";
            if ($row = mysqli_fetch_assoc($result) > 0) {
                return false;
            }
            
            else mysqli_query($this->con, $sql);
            return true;
        }

        public function destroy ($manv, $ngaydilam, $calam) {
            $sql = "DELETE FROM sochamcong WHERE MANV = '$manv' AND NGAYDILAM = '$ngaydilam' AND CALAM = '$calam'";
            return mysqli_query($this->con, $sql);
        }

        public function getLuong () {
            $sql = "SELECT sochamcong.MANV, nhanvien.HONV, nhanvien.TENNV, COUNT(sochamcong.MANV) as socong, nhanvien.LUONGCA, COUNT(sochamcong.MANV) * nhanvien.LUONGCA as luong FROM sochamcong INNER JOIN nhanvien ON sochamcong.MANV = nhanvien.MANV WHERE MONTH(sochamcong.NGAYDILAM) = MONTH(CURRENT_DATE) GROUP BY sochamcong.MANV;";
            return mysqli_query($this->con, $sql);
        }

        public function getLuongMonth ($month) {
            $sql = "SELECT sochamcong.MANV, nhanvien.HONV, nhanvien.TENNV, COUNT(sochamcong.MANV) as socong, nhanvien.LUONGCA, COUNT(sochamcong.MANV) * nhanvien.LUONGCA as luong FROM sochamcong INNER JOIN nhanvien ON sochamcong.MANV = nhanvien.MANV WHERE MONTH(sochamcong.NGAYDILAM) = $month GROUP BY sochamcong.MANV;";
            return mysqli_query($this->con, $sql);
        }
    }
?>