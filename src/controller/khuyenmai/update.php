<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['makm_edit'])) {
        $makm = $_GET['makm_edit'];
        $sql = "call sp_crud_KhuyenMai('$makm', '', '', '', 0.0,'Select')";
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

    if(isset($_POST['khuyenmai_hidden_data'])){
        $makm_update = $_POST['khuyenmai_hidden_data'];
        $tenkm_update = $_POST['tenkm_update'];
        $tgap_update = $_POST['tgap_update'];
        $tgkt_update = $_POST['tgkt_update'];
        $giatri_update = $_POST['giatri_update'];

        $sql = "call sp_crud_KhuyenMai('$makm_update', '$tenkm_update', '$tgap_update', '$tgkt_update', $giatri_update,'Update')";
        $result = mysqli_query($con,$sql);
    }
?>