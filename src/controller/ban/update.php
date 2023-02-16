<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['maban_edit'])) {
        $maban = $_GET['maban_edit'];
        $sql = "call sp_crud_ban( '$maban' , '', '', b'0', 'Select' )";
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

    if(isset($_POST['ban_hidden_data'])){
        $maban_update = $_POST['ban_hidden_data'];
        $khuvuc_update= $_POST['khuvuc_update'];
        $phuthu_update= $_POST['phuthu_update'];
        $trangthai_update= $_POST['trangthai_update'];

        $sql = "call sp_crud_ban( '$maban_update' , '$khuvuc_update', '$phuthu_update', $trangthai_update, 'Update' )";
        $result = mysqli_query($con,$sql);
    }
?>