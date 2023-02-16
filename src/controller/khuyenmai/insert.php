<?php
    include '../../configuration/connect.php';
    extract($_POST);
    if(isset($_POST['makm']) && isset($_POST['tenkm']) && isset($_POST['tgap']) && isset($_POST['tgkt']) && isset($_POST['giatri'])) {
        $sql = "call sp_crud_KhuyenMai('$makm', '$tenkm', '$tgap', 'tgkt', $giatri,'Insert')";
        $result = mysqli_query($con, $sql);
    }
?>