<?php 
    require_once './mvc/core/Model.php';
    class Hoivien extends Model {
        protected $table = 'hoivien';
        //protected $fillable = ['MAHD', 'MANV', 'SOTHE', 'NGAYLAPHD', 'GIOLAPHD', 'GIAMGIA', 'MAKM', 'MABAN', 'CHUTHICH' ];
        
        public function createOrUpdate($sothe, $tenhv, $ngaysinh, $diachi, $sdt, $sccd, $diemtl, $loaihv) {
            $check = "SELECT * FROM hoivien WHERE SOTHE = '$sothe'";
            $result = mysqli_query($this->con, $check);
            $action = 'Insert';
            if ($row = mysqli_fetch_assoc($result)) {
                $action = 'Update';
            }
            $sql = "call sp_crud_Hoivien( '$sothe' , '$tenhv', '$ngaysinh', '$diachi', '$sdt', '$sccd', $diemtl, '$loaihv', '$action')";
            return mysqli_query($this->con, $sql);
        }

    }
?>