<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['nhanvien'])){
        $table = '
            <table class="table mx-auto" id="ban-table">
              <thead class="text-white bg-brown">
                <tr>
                    <td>Ma NV</td>
                    <td>Ho ten NV</td>
                    <td>Gioi tinh</td>
                    <td>Chuc vu</td>
                    <td>Luong ca</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `nhanvien`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $manv = $row['MANV'];
            if($row['GIOITINH'] == 1) $sex = 'Nam';
            else $sex = 'Nu';
            $table .= '
                <tr>
                    <td>'.$row['MANV'].'</td>
                    <td>'.$row['HONV'].' '.$row['TENNV'].'</td>
                    <td>'.$sex.'</td>
                    <td>'.$row['CHUCVU'].'</td>
                    <td>'.$row['LUONGCA'].'</td>
                    <td>
                        <button class="btn btn-info btn-detail" id="'.$row['MANV'].'"><i class="fa-solid fa-circle-info text-white"></i></button>
                        <button class="btn bg-brown btn-dark btn-edit" id="'.$row['MANV'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MANV'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }

    if(isset($_GET['manv_detail'])) {
        $manv = $_GET['manv_detail'];
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
?>

