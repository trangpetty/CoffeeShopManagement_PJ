
<?php 
    extract($_POST);
    extract($_GET);
    
    class NhanvienController extends Controller{
        function index() {
            $this->view("index", [
                'page' => 'nhanvien/index',
            ]);
        }
        
        function getList () {
            $nhanvien = $this->model("Nhanvien");
            return $this->view('nhanvien/list', ['nhanvien' => $nhanvien->orderBy($_POST['text'], $_POST['filter'])]);
        }
        
        function search () {
            $nhanvien = $this->model("Nhanvien");
            return $this->view('nhanvien/list', ['nhanvien' => $nhanvien->like('MANV', '%'.$_POST['pattern'].'%')]);
        }

        function getDetail ($id) {
            $nhanvien = $this->model("Nhanvien")->like('MANV', '%'.$id.'%');
            while($row = mysqli_fetch_assoc($nhanvien)){
                $response = $row;
            }
            echo json_encode($response);
        }

        function createOrUpdate () {
            $nhanvien = $this->model("Nhanvien");
            $nhanvien->createOrUpdate($_POST['manv'], $_POST['honv'], $_POST['tennv'],$_POST['gioitinh'],$_POST['ngaysinh'],$_POST['noisinh'],$_POST['diachi'],$_POST['dienthoai'],$_POST['nbddl'],$_POST['scccd'],$_POST['chucvu'],$_POST['luongca']);
            if($nhanvien) $response = 'success';
            else $response = 'failed';
            echo $response;
        }

        function destroy ($id){
            $nhanvien = $this->model("Nhanvien");
            $nhanvien->delete('MANV', ''.$id.'');
            return json_encode(['status' => 'success']);
        }

        function deleteArr () {
            $arr = $_POST['arr'];
            for($i = 0; $i < count($arr); $i++){
                $nhanvien = $this->model("Nhanvien")->delete('MANV', ''.$arr[$i].'');
            }
            return json_encode(['status'=> 'success']); // 200 là mã lỗi
        }
        
    }

?>