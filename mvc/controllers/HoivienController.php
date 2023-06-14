
<?php 
    extract($_POST);
    extract($_GET);
    
    class HoivienController extends Controller{
        function index() {
            $this->view("index", [
                'page' => 'hoivien/index',
            ]);
        }
        
        function getList () {
            $hoivien = $this->model("Hoivien");
            return $this->view('hoivien/list', ['hoivien' => $hoivien->orderBy($_POST['text'], $_POST['filter'])]);
        }
        
        function search () {
            $hoivien = $this->model("Hoivien");
            return $this->view('hoivien/list', ['hoivien' => $hoivien->like('SOTHE', '%'.$_POST['pattern'].'%')]);
        }

        function getDetail ($id) {
            $response = array();
            $hoivien = $this->model("hoivien")->like('SOTHE', '%'.$id.'%');
            while($row = mysqli_fetch_assoc($hoivien)){
                $response = $row;
            }
            echo json_encode($response);
        }

        function createOrUpdate () {
            $hoivien = $this->model("hoivien");
            $diemtl = $_POST['diemtl'];
            if($diemtl <= 5) $loaihv = "VIP1";
            elseif ($diemtl > 5 && $diemtl <= 15) $loaihv = "VIP2";
            elseif ($diemtl > 15) $loaihv = "VIP3";
            $hoivien->createOrUpdate($_POST['sothe'], $_POST['tenhv'],$_POST['ngaysinh'],$_POST['diachi'], $_POST['scccd'],$_POST['sdt'],$diemtl,$loaihv);
            if($hoivien) $response = 'success';
            else $response = 'failed';
            echo $response;
        }

        function destroy ($id){
            $hoivien = $this->model("Hoivien");
            $hoivien->delete('SOTHE', ''.$id.'');
            return json_encode(['status' => 'success']);
        }

        function deleteArr () {
            $arr = $_POST['arr'];
            for($i = 0; $i < count($arr); $i++){
                $hoivien = $this->model("Hoivien")->delete('SOTHE', ''.$arr[$i].'');
            }
            return json_encode(['status'=> 'success']); // 200 là mã lỗi
        }
        
    }

?>