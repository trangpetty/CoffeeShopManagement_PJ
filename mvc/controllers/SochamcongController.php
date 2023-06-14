
<?php 
    extract($_POST);
    extract($_GET);
    
    class SochamcongController extends Controller{
        function index() {
            $this->view("index", [
                'page' => 'sochamcong/index',
            ]);
        }
        
        function getList () {
            $sochamcong = $this->model("Sochamcong");
            return $this->view('sochamcong/list', ['sochamcong' => $sochamcong->orderBy($_POST['text'], $_POST['filter'])]);
        }
        
        function search () {
            $sochamcong = $this->model("Sochamcong");
            return $this->view('sochamcong/list', ['sochamcong' => $sochamcong->like('MANV', '%'.$_POST['pattern'].'%')]);
        }

        function create () {
            $sochamcong = $this->model("Sochamcong");
            
            $sochamcong = $sochamcong->create($_POST['manv'], $_POST['ngaydilam'], $_POST['calam']);
            if($sochamcong) $response = 'success';
            else $response = 'failed';
            echo $response;
        }

        function destroy (){
            $sochamcong = $this->model("Sochamcong");
            $sochamcong->destroy($_POST['manv'], $_POST['ngaydilam'], $_POST['calam']);
            return json_encode(['status' => 'success']);
        }
    }

?>