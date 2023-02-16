<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['masp_delete'])){
        $unique = $_POST['masp_delete'];
        $sql = "call sp_crud_Sanpham( '$unique' , '', 0.0, '', '', 'Delete')";
        $result = mysqli_query($con,$sql);
    }
?>