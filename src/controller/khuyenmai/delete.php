<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['makm_delete'])){
        $unique = $_POST['makm_delete'];
        echo $unique;
        $sql = "call sp_crud_KhuyenMai('$makm_delete', '', '', '', 0.0,'Delete')";
        $result = mysqli_query($con,$sql);
    }
?>