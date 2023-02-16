<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['sothe']) && isset($_POST['tenhv']) && isset($_POST['ngaysinh'])) {
        if($diemtl <= 5) $loaihv = "VIP1";
        elseif ($diemtl > 5 && $diemtl <= 15) $loaihv = "VIP2";
        elseif ($diemtl > 15) $loaihv = "VIP3";
        $sql = "call sp_crud_Hoivien( '$sothe' , '$tenhv', '$ngaysinh', '$diachi', '$sdt', '$sccd', $diemtl, '$loaihv', 'Delete')";
        $result = mysqli_query($con, $sql);
    }
?>