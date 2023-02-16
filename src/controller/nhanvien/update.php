<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['manv_edit'])) {
        $manv = $_GET['manv_edit'];
        $sql = "call sp_crud_NhanVien ( '$manv' , '', '', 0 , '' , '', '', '', '' , '', '', 0.00 , 'Select' )";
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

    if(isset($_POST['nhanvien_hidden_data'])){
        $manv_update = $_POST['nhanvien_hidden_data'];
        $honv_update = $_POST['honv_update'];
        $tennv_update = $_POST['tennv_update'];
        $gioitinh_update = $_POST['gioitinh_update'];
        $ngaysinh_update= $_POST['ngaysinh_update'];
        $noisinh_update= $_POST['noisinh_update'];
        $diachi_update= $_POST['diachi_update'];
        $dienthoai_update= $_POST['dienthoai_update'];
        $nbddl_update= $_POST['nbddl_update'];
        $scccd_update= $_POST['scccd_update'];
        $chucvu_update= $_POST['chucvu_update'];
        $luongca_update = $_POST['luongca_update'];

        $sql = "call sp_crud_NhanVien ( '$manv_update' , '$honv_update', '$tennv_update', $gioitinh_update, '$ngaysinh_update', '$noisinh_update', '$diachi_update', '$dienthoai_update', '$nbddl_update', '$scccd_update', '$chucvu_update', $luongca_update , 'Update' )";
        $result = mysqli_query($con,$sql);
    }
?>