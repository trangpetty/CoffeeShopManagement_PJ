<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['manvcc_edit']) && isset($_GET['ngaydilam_edit']) && isset($_GET['calam_edit'])) {
        $sql = "call sp_crud_SoChamCong('$manvcc_edit', '$ngaydilam_edit', '$calam_edit', 'Select')";
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
    if(isset($_POST['sochamcong_hidden_data'])){
        $sql = "UPDATE `sochamcong` SET MANV='$manvcc_update', NGAYDILAM='$ngaydilam_update',CALAM='$calam_update' WHERE MANV='$get_manvcc' AND NGAYDILAM='$get_ngaydilam' AND CALAM='$get_calam'";
        $result = mysqli_query($con,$sql);
    }
?>