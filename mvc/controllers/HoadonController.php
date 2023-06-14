<?php 
    extract($_POST);
    
    class HoadonController extends Controller{
        function index () {
            return $this->view("index", [
                'page' => 'hoadon/index',
            ]);
        }

        function search () {
            $hoadon = $this->model("Hoadon");
            return $this->view('hoadon/list', ['hoadon' => $hoadon->like('MANV', '%'.$_POST['pattern'].'%')]);
        }

        function getList () {
            $hoadon = $this->model("Hoadon");
            return $this->view('hoadon/list', ['hoadon' => $hoadon->all()]);
        }

        function getDetail ($id) {
            $hoadon = $this->model("ChitietHoadon")->where('MAHD', $id);
            return $this->view('hoadon/detail', [
                'hoadon' => $hoadon,
                'id' => $id
            ]);
        }

        function create () {
            $hoadon = $this->model("Hoadon")->create($_POST['manv'], $_POST['sothe'], $_POST['giamgia'], $_POST['chuthich']);
            echo json_encode(['status' => 'success']);
        }

        function createCTHD () {
            $CTHD = $this->model("ChitietHoadon")->create($_POST['masp'], $_POST['soluong'], $_POST['dongia']);
            echo json_encode(['status' => 'success']);
        }        

        function destroy ($id){
            $hoadon = $this->model("Hoadon");
            $hoadon->delete('MAHD', $id);
            return json_encode(['status' => 'success']);
        }
    }

?>