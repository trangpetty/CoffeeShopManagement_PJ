<?php 
    require_once './mvc/core/Model.php';
    class Hoadon extends Model {
        protected $table = 'hoadonbanhang';
        protected $fillable = ['MAHD', 'MANV', 'SOTHE', 'NGAYLAPHD', 'GIOLAPHD', 'GIAMGIA', 'MAKM', 'MABAN', 'CHUTHICH' ];
        
        public function create ($manv, $sothe, $giamgia, $chuthich) {
            $sql = "INSERT INTO `hoadonbanhang` (MANV,SOTHE,GIAMGIA,CHUTHICH) VALUES('$manv','$sothe','$giamgia','$chuthich')";
            return mysqli_query($this->con, $sql);            
        }
    }

?>