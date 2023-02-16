<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['masp']) && isset($_POST['tensp']) && isset($_POST['gia']) && isset($_POST['size']) && isset($_POST['nhomloai'])) {
        $sql = "call sp_crud_Sanpham('$masp', '$tensp', $gia, '$size', '$nhomloai', 'Insert')";
        $result = mysqli_query($con, $sql);
    }
?>