
<?php 
    extract($_POST);
    extract($_GET);
    
    class ThongkeController extends Controller{
        function index () {
            return $this->view("index", [
                'page' => 'thongke/index',
            ]);
        }
        
        function getTopSP () {
            $top = $this->model("ChitietHoadon")->getTopSP();
            return $this->view('thongke/topSP', ['topSP' => $top]);
        }
        
        function getDoanhthu () {
            $top = $this->model("ChitietHoadon")->getDoanhthu();
            return $this->view('thongke/doanhthu', ['doanhthu' => $top]);
        }

        function getDoanhso () {
            $respone = array();
            for($i = 1; $i <= 12; $i++){
                $top = $this->model("ChitietHoadon")->getDoanhso($i);
                while ($row = mysqli_fetch_assoc($top)) {
                    if ($row['don_gia'])
                        $respone[$i] = (int)$row['don_gia'];
                    else {
                        $respone[$i] = 0;               
                    }
                }
            }
            echo json_encode($respone);
        }

        function getLuong () {
            $top = $this->model("Sochamcong")->getLuong();
            $this->view("index", [
                'page' => 'thongke/luong',
                'luong' => $top
            ]);
        }

        function getLuongMonth () {
            $top = $this->model("Sochamcong")->getLuongMonth($_GET['month']);
            $this->view("index", [
                'page' => 'thongke/luong',
                'luong' => $top
            ]);
        }
    }

?>