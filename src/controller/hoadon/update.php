<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['mahd_edit'])) {
        $mahd = $_GET['mahd_edit'];
        $sql = "SELECT * FROM hoadonbanhang WHERE MAHD='$mahd'";
        $result = mysqli_query($con,$sql);
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
        echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = 'Invalidd or data not found';
    }

    extract($_POST);
    if(isset($_POST['hoadon_hidden_data'])){
        $mahd_update = $_POST['hoadon_hidden_data'];
        $sql = "UPDATE `hoadonbanhang` SET MANV='$manvhd_update', SOTHE='$sothehd_update', NGAYLAPHD='$nlhd_update', GIOLAPHD='$glhd_update', GIAMGIA='$giamgia_update', MAKM='$makmhd_update',MABAN='$mabanhd_update',chuthich='$chuthich_update' where MAHD='$mahd_update'";
        $result = mysqli_query($con,$sql);
    }
?>