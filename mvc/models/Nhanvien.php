<?php 
    require_once './mvc/core/Model.php';
    class Nhanvien extends Model {
        protected $table = 'nhanvien';
        //protected $fillable = ['MAHD', 'MANV', 'SOTHE', 'NGAYLAPHD', 'GIOLAPHD', 'GIAMGIA', 'MAKM', 'MABAN', 'CHUTHICH' ];
        
        public function createOrUpdate($manv, $honv, $tennv, $gioitinh, $ngaysinh, $noisinh, $diachi, $dienthoai, $nbdl, $scccd, $chucvu, $luongca) {
            $check = "SELECT * FROM nhanvien WHERE MANV = '$manv'";
            $result = mysqli_query($this->con, $check);
            $action = 'Insert';
            if ($row = mysqli_fetch_assoc($result)) {
                $action = 'Update';
            }
            $sql = "call sp_crud_NhanVien ( '$manv' , '$honv', '$tennv', $gioitinh, '$ngaysinh', '$noisinh', '$diachi', '$dienthoai', '$nbdl', '$scccd', '$chucvu', $luongca , '$action' )";
            //echo $sql;
            return mysqli_query($this->con, $sql);
        }

        // public function update($manv, $honv, $tennv, $gioitinh, $ngaysinh, $noisinh, $diachi, $dienthoai, $nbdl, $scccd, $chucvu, $luongca) {
        //     $sql = "call sp_crud_NhanVien ( '$manv' , '$honv', '$tennv', $gioitinh, '$ngaysinh', '$noisinh', '$diachi', '$dienthoai', '$nbdl', '$scccd', '$chucvu', $luongca , 'Update' )";
        //     return mysqli_query($this->con, $sql);
        // }
    }
?>