<?php 
    class Model extends DB {
        protected $table;
        protected $fillable = [];
        public function all () {
            $sql = "SELECT * FROM $this->table";
            return mysqli_query($this->con, $sql);
        }

        public function where ($column, $input) {
            $sql = "SELECT * FROM $this->table WHERE $column = $input";
            return mysqli_query($this->con, $sql);
        }

        public function get ($column) {
            $sql = "SELECT $column FROM $this->table WHERE $column = $input";
            return mysqli_query($this->con, $sql);
        }

        // public function create($data = []) {
        //     $sql = "INSERT INTO $this->table ($this->fillable) VALUES($data)";
        // INSERT INTO $this->table ([MANV, SOTHE, ...])
        // $nhan
        //     return mysqli_query($this->con, $sql);
        // }

        public function delete ($column, $input) {
            $sql = "DELETE FROM $this->table WHERE $column = '$input'";
            return mysqli_query($this->con, $sql);
        }

        public function orderBy ($column, $type) {
            if ($type == '') $type = 'ASC';
            $sql = "SELECT * FROM $this->table ORDER BY $column $type";
            return mysqli_query($this->con, $sql);
        }

        public function like ($column, $pattern) {
            if ($pattern == '') $pattern = '%';
            $sql = "SELECT * FROM $this->table WHERE $column LIKE '$pattern'";
            return mysqli_query($this->con, $sql);
        }
    }

?>