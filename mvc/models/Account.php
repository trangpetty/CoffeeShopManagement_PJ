<?php 
    require_once './mvc/core/Model.php';
    class Account extends Model {
        protected $table = 'account';
        protected $fillable = ['username', 'password', 'role'];
        
        public function attempt ($username, $password) {
            $sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
            return mysqli_query($this->con, $sql);
        }

        public function create ($username, $password) {
            $sql = "INSERT INTO account VALUES('$username','$password', 0)";
            return mysqli_query($this->con, $sql);
        }
    }
?>