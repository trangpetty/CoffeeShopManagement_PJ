
<?php 
    extract($_POST);
    extract($_GET);
    
    class SanphamController extends Controller{
        function index() {
            $this->view("index", [
                'page' => 'sanpham/index',
            ]);
        }
        
        function getList () {
            $this->paginate(5, 'Sanpham', 'MASP', $_POST['text'], $_POST['filter']);
        }
        
        function search () {
            $sanpham = $this->model("Sanpham");
            return $this->view('sanpham/list', ['data' => $sanpham->like('MASP', '%'.$_POST['pattern'].'%')]);
        }

        function getDetail ($id) {
            $sanpham = $this->model("Sanpham")->like('MASP', '%'.$id.'%');
            while($row = mysqli_fetch_assoc($sanpham)){
                $response = $row;
            }
            echo json_encode($response);
        }

        function createOrUpdate () {
            $sanpham = $this->model("Sanpham");
            $sanpham->createOrUpdate($_POST['masp'], $_POST['tensp'], $_POST['gia'],$_POST['size'],$_POST['nhomloai']);
            if($sanpham) $response = 'success';
            else $response = 'failed';
            echo $response;
        }

        function destroy ($id){
            $sanpham = $this->model("Sanpham");
            $sanpham->delete('MASP', ''.$id.'');
            return json_encode(['status' => 'success']);
        }

        function deleteArr () {
            $arr = $_POST['arr'];
            for($i = 0; $i < count($arr); $i++){
                $sanpham = $this->model("Sanpham")->delete('MASP', ''.$arr[$i].'');
            }
            return json_encode(['status'=> 'success']); // 200 là mã lỗi
        }
        
    }

?>