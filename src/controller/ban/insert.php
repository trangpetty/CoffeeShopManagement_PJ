<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['maban']) && isset($_POST['khuvuc']) && isset($_POST['phuthu'])) {
        $sql = "call sp_crud_ban( '$maban' , '$khuvuc', '$phuthu', b'0', 'Insert' )";

        $result = mysqli_query($con, $sql);
    }
?>