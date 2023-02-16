<?php
    include '../../configuration/connect.php';
    extract($_GET);
    if(isset($_GET['hoadon'])){
        $table = '
            <table class="table mx-auto" id="hoadon-table">
              <thead class="bg-brown text-white">
                <tr>
                    <td>Ma HD</td>
                    <td>Ma NV</td>
                    <td>Hoi Vien</td>
                    <td>Ngay lap HD</td>
                    <td>Gio lap HD</td>
                    <td>Giam</td>
                    <td>Ma KM</td>
                    <td>Ma Ban</td>
                    <td>Chu thich</td>
                    <td>Actions</td>
                </tr>
              </thead>
        ';
        $sql = "SELECT * FROM `hoadonbanhang`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $mahd = $row['MAHD'];
            $table .= '
                <tr>
                    <td>'.$row['MAHD'].'</td>
                    <td>'.$row['MANV'].'</td>
                    <td>'.$row['SOTHE'].'</td>
                    <td>'.$row['NGAYLAPHD'].'</td>
                    <td>'.$row['GIOLAPHD'].'</td>
                    <td>'.$row['GIAMGIA'].'</td>
                    <td>'.$row['MAKM'].'</td>
                    <td>'.$row['MABAN'].'</td>
                    <td>'.$row['chuthich'].'</td>
                    <td>
                        <a href="../../view/chitiethoadon/index.php?id='.$mahd.'" class="btn btn-info btn-detail" id="'.$row['MANV'].'"><i class="fa-solid fa-circle-info text-white"></i></a>
                        <button class="btn btn-dark bg-brown btn-edit" id="'.$row['MAHD'].'"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-delete" id="'.$row['MAHD'].'""><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            ';
        }
        $table .= '</table>';
        echo $table;
    }

    //  Lay danh sach hoi vien
    if(isset($_GET['sothehd_edit'])){
        $select_hv = '';
        $sql = "SELECT SOTHE FROM `hoivien`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $sothe = $row['SOTHE'];
            $select_hv .= '<option value="'.$sothe.'">'.$sothe.'</option>';
        }
        echo $select_hv;
    }
    //    Lay danh sach ma khuyen mai
    if(isset($_GET['makmhd_edit'])){
        $select_makm = '';
        $sql = "SELECT MAKM FROM `khuyenmai`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $makm = $row['MAKM'];
            $select_makm .= '<option value="'.$makm.'">'.$makm.'</option>';
        }
        echo $select_makm;
    }

    if(isset($_GET['manvhd_edit'])){
        $select_manv = '';
        $sql = "SELECT MANV FROM `nhanvien`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $manv = $row['MANV'];
            $select_manv .= '<option value="'.$manv.'">'.$manv.'</option>';
        }
        echo $select_manv;
    }

    if(isset($_GET['mabanhd_edit'])){
        $select_maban = '';
        $sql = "SELECT MABAN FROM `ban`";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $maban = $row['MABAN'];
            $select_maban .= '<option value="'.$maban.'">'.$maban.'</option>';
        }
        echo $select_maban;
    }
?>

