<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['maban_delete'])){
        $unique = $_POST['maban_delete'];
        echo $unique;
        $sql = "call sp_crud_ban ( '$unique' , '', '', 0, 'Delete' )";
        $result = mysqli_query($con,$sql);
    }
?>