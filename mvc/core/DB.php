<?php 
    class DB {
        public $con;
        protected $servername = 'localhost';
        protected $username = 'root';
        protected $password = '';
        protected $dbname = 'qlbh_cf';

        function __construct() {
            $this->con = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con, $this->dbname);
        }
    }
?>