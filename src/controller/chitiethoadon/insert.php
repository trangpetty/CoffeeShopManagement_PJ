<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['masp_user'])){
        $sql = "SELECT MAX(MAHD) AS MAXMAHD FROM `hoadonbanhang`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_array($result)) {
            $mahd = $row['MAXMAHD'];
        }
        $sql = "call insert_chitiethoadon('$mahd','$masp_user','$soluong_user','$dongia_user')";
        $result = mysqli_query($con, $sql);
    }
?>