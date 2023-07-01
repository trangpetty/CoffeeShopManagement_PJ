<?php 
    session_start();
    extract($_POST);
    extract($_GET);
    $_SESSION['role'] = 2;
    
    class LoginController extends Controller{
        function index() {
            if($_SESSION['role'] == 1){
                return $this->view('index');
            }
            else if ($_SESSION['role'] == 0) {
                return $this->view('user/index');
            }
            else $_SESSION['role'] = 2;
            return $this->view('login');
        }
        
        function login () {
            $account = $this->model("Account")->attempt($_POST['username'], $_POST['password']);
            $array_message['message'] = -1;
            if(mysqli_num_rows($account) > 0){
                $row = mysqli_fetch_assoc($account);
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                $array_message['message'] = 1;
                if($row['role'] == 1){
                    $array_message['success'] = '/php_tur/QLBH_CF/Hoadon/';
                } 
                elseif ($row['role'] == 0)
                    $array_message['success'] = '/php_tur/QLBH_CF/User';
            }
            else {
                $array_message['message'] = 0;
            }
            echo json_encode($array_message);
        }
        
        function logout () {
            session_unset();
            session_destroy();
            $_SESSION['role'] = 2;
        }

        function create () {
            $account = $this->model("Account")->like('username', '%'.$_POST['username'].'%');
            $response['status'] = '';
            if(mysqli_fetch_assoc($account) > 0) {
                $response['status'] = 'Failed';
            } 
            else {
                $this->model("Account")->create($_POST['username'], $_POST['password']);
                $response['status'] = 'Success';
                $_SESSION['role'] = 1;
            } 
            
            echo json_encode($response['status']);
        }
        
    }

?>