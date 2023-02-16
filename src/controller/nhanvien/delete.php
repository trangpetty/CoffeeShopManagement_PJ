<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['manv_delete'])){
        $unique = $_POST['manv_delete'];
        echo $unique;
        $sql = "call sp_crud_NhanVien ( '$unique' , '', '', 0, '', '', '', '', '', '', '', 0.0, 'Delete' )";
        $result = mysqli_query($con,$sql);
    }
?>