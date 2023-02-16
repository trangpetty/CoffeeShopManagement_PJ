<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['manvcc_del']) && isset($_POST['ngaydilam_del']) && isset($_POST['calam_del'])){
        $sql="call sp_crud_SoChamCong('$manvcc_del', '$ngaydilam_del', '$calam_del', 'Delete')";
//        $sql = "DELETE FROM `sochamcong` WHERE MANV='$manvcc_del' AND NGAYDILAM='$ngaydilam_del' AND CALAM='$calam_del'";
        $result = mysqli_query($con,$sql);
    }
?>