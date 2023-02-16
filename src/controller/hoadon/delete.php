<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['mahd_delete'])){
        $unique = $_POST['mahd_delete'];
        $sql = "DELETE FROM `hoadonbanhang` WHERE MAHD='$unique'";
        $result = mysqli_query($con,$sql);
    }
?>