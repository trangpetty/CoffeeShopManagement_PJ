<?php 
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
?>