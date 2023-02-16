<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['sothe_delete'])){
        $unique = $_POST['sothe_delete'];
        $sql = "call sp_crud_Hoivien( '$unique' , '', '', '', '', '', 0, '', 'Delete')";
        $result = mysqli_query($con,$sql);
    }
?>