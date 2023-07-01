<?php 
    class Model extends DB {
        protected $table;
        protected $fillable = [];
        public function all () {
            $sql = "SELECT * FROM $this->table";
            return mysqli_query($this->con, $sql);
        }

        public function paginate ($limit, $page, $column, $filter) {
            $start_from = ($page - 1) * $limit;
            $sql = "SELECT * FROM $this->table ORDER BY $column $filter LIMIT $start_from, $limit";
            return mysqli_query($this->con, $sql);
        }

        public function count ($column) {
            $sql = "SELECT COUNT($column) FROM $this->table";
            $result = mysqli_query($this->con, $sql);
            $rows = mysqli_fetch_assoc($result);
            return (int)$rows["COUNT($column)"];
        }

        public function where ($column, $input) {
            $sql = "SELECT * FROM $this->table WHERE $column = $input";
            return mysqli_query($this->con, $sql);
        }

        public function get ($column) {
            $sql = "SELECT $column FROM $this->table WHERE $column = $input";
            return mysqli_query($this->con, $sql);
        }

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

        public function orlike ($column1, $column2, $pattern) {
            if ($pattern == '') $pattern = '%';
            $sql = "SELECT * FROM $this->table WHERE $column1 LIKE '$pattern' OR $column2 LIKE '$pattern'";
            return mysqli_query($this->con, $sql);
        }
    }

?>