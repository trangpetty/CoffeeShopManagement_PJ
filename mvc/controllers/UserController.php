<?php 
    session_start();
    extract($_POST);
    extract($_GET);
    $_SESSION['role'] = 2;
    
    class UserController extends Controller{
        function index() {
            $nhomloai = $this->model('Sanpham')->getNhomloai();
            $nhanvien = $this->model("Nhanvien")->all();
            $hoivien = $this->model("Hoivien")->all();
            return $this->view('user/index', [
                'page' => 'user/bill',
                'nhomloai' => $this->model('Sanpham')->getNhomloai(),
                'nhanvien' => $nhanvien,
                'hoivien' => $hoivien
            ]);
        }

        // function allSP () {
        //     $nhomloai = $this->model('Sanpham')->getNhomloai();
        //     $group_nhomloai = array();
        //     $group_item = array();
        //     while ($row = mysqli_fetch_assoc($nhomloai)) {
        //         array_push($group_nhomloai, $row['NHOMLOAI']);
        //     }
        //     for($i = 0; $i < count($group_nhomloai); $i++){
        //         $item = $this->model('Sanpham')->like('NHOMLOAI', '%'.$group_nhomloai[$i].'%');
        //         $group = array();
        //         while ($row = mysqli_fetch_assoc($item)) {
        //             array_push($group, $row);
        //         }
        //         array_push($group_item, $group);
        //     }

        //     return $this->view('user/all_sp', [
        //         'group_nhomloai' => $group_nhomloai,
        //         'group_item' => $group_item
        //     ]);
        // }

        function nhomloaisp () {
            $nhomloai_sp = $this->model('Sanpham')->like('NHOMLOAI', '%'.$_POST['nhomloai'].'%');
            return $this->view('user/nhomloaisp', ['result' => $nhomloai_sp, 'nhomloai' => $_POST['nhomloai']]);
        }

        function getHV () {
            $hoivien = $this->model('Hoivien')->like('SOTHE', '%'.$_POST['sothe'].'%');
            while($row = mysqli_fetch_assoc($hoivien)){
                $response = $row;
            }
            echo json_encode($response);
        }

        function logout () {
            session_unset();
            session_destroy();
            $_SESSION['role'] = 2;
        }

        function searchSP () {
            $sanpham = $this->model('Sanpham')->like('MASP', '%'.$_POST['masp'].'%');
            return $this->view('user/searchsp', ['sanpham' => $sanpham]);
        }
        
    }

?>