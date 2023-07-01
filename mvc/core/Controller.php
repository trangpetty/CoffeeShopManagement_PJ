<?php 
    class Controller {
        public function model ($model) {
            require_once './mvc/models/' .$model. '.php';
            return new $model;
        }

        public function view ($view, $data=[]) {
            require_once './mvc/views/' .$view. '.php';
        }

        public function paginate ($limit = 5, $model, $column, $text, $filter) {
            $page = 0;
            $display = '';
            if(isset($_POST['page'])) {
                $page = $_POST['page'];
            }
            else {
                $page = 1;
            }
            $total_rows = $this->model($model)->count($column);
            $total_pages = ceil($total_rows / $limit); 
            $data = $this->model($model)->paginate($limit, $page, $text, $filter);
            $display .= '<ul class="pagination justify-content-center">';
            if($page > 1) {
                $previous = $page - 1;
                $display .= '
                    <li class="page-item d-flex align-items-center" id="1"><i class="page-link text-brown fa-solid fa-angles-left" style="line-height: 24px"></i></li>
                    <li class="page-item" id="'.$previous.'"></li>
                ';
            }

            for($i = 1; $i < $total_pages; $i++) {
                $active = "text-brown";
                if($i == $page) {
                    $active = "bg-brown text-white";
                }
                $display .= '<li class="page-item" id="'.$i.'"><span class="page-link '.$active.'">'.$i.'</span></li>';
            }

            if($page < $total_pages) {
                $page++;
                $display .= '
                    <li class="page-item" id="'.$page.'"></li>
                    <li class="page-item d-flex align-items-center" id="'.$total_pages.'"><i class="page-link text-brown fa-solid fa-angles-right" style="line-height: 24px"></i></li>
                ';
            }
            $link = strtolower($model).'/list';
            return $this->view($link, ['data' => $data, 'display' => $display]);
        }
    }
?>