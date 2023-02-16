<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['sothe_edit'])) {
        $sothe = $_GET['sothe_edit'];
        $sql = "call sp_crud_Hoivien( '$sothe' , '', '', '', '', '', 0, '', 'Select')";
        $result = mysqli_query($con,$sql);
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
        echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = 'Invalid or data not found';
    }

    if(isset($_POST['hoivien_hidden_data'])){
        $sothe_update = $_POST['hoivien_hidden_data'];
        $tenhv_update = $_POST['tenhv_update'];
        $ngaysinhhv_update = $_POST['ngaysinhhv_update'];
        $diachi_update = $_POST['diachi_update'];
        $sdt_update = $_POST['sdt_update'];
        $scccd_update = $_POST['scccd_update'];
        $diemtl_update = $_POST['diemtl_update'];
        if($diemtl_update <= 5) $loaihv = "VIP1";
        elseif ($diemtl_update > 5 && $diemtl_update <= 15) $loaihv = "VIP2";
        elseif ($diemtl_update > 15) $loaihv = "VIP3";

        $sql = "call sp_crud_Hoivien( '$sothe_update' , '$tenhv_update', '$ngaysinhhv_update', '$diachi_update', '$sdt_update', '$scccd_update', $diemtl_update, '$loaihv', 'Update')";
        $result = mysqli_query($con,$sql);
    }
?>