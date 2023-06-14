<?php 
    require_once './mvc/core/Model.php';
    class Sanpham extends Model {
        protected $table = 'sanpham';
        //protected $fillable = ['MAHD', 'MANV', 'SOTHE', 'NGAYLAPHD', 'GIOLAPHD', 'GIAMGIA', 'MAKM', 'MABAN', 'CHUTHICH' ];
        
        public function createOrUpdate($masp, $tensp, $gia, $size, $nhomloai) {
            $check = "SELECT * FROM sanpham WHERE MASP = '$masp'";
            $result = mysqli_query($this->con, $check);
            $action = 'Insert';
            if ($row = mysqli_fetch_assoc($result)) {
                $action = 'Update';
            }
            $sql = "call sp_crud_Sanpham('$masp', '$tensp', $gia, '$size', '$nhomloai', '$action')";
            //echo $sql;
            return mysqli_query($this->con, $sql);
        }

        public function getNhomloai () {
            $sql = "SELECT DISTINCT NHOMLOAI FROM `sanpham`";
            return mysqli_query($this->con, $sql);
        }
    }
?>