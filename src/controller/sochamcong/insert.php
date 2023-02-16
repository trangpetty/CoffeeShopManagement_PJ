<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['manvcc']) && isset($_POST['ngaydilam']) && isset($_POST['calam'])) {
        $sql = "call sp_crud_SoChamCong('$manvcc', '$ngaydilam', '$calam', 'Insert')";
        $result = mysqli_query($con, $sql);
    }
?>