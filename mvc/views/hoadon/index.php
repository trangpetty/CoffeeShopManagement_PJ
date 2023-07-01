<div id="hoadon-page">
    <h1 class="text-center text-brown">HÓA ĐƠN</h1>
    <div class="d-flex my-2 justify-content-between">
        <div class="d-flex">
            <select class="form-select me-2" id="hoadon-select_orderby">
                <option value="MAHD">Mã hoá đơn</option>
                <option value="MANV">Mã nhân viên</option>
                <option value="NGAYLAPHD">Ngày</option>
            </select>
            <div class="d-flex flex-column me-4"><i class="fa-solid fa-caret-up asc icon-arrow active" style="cursor: pointer"></i><i class="fa-solid fa-caret-down desc icon-arrow" style="cursor: pointer"></i></div>
        </div>
        <div class="d-flex">
            <input type="text" class="form-control" id="hoadon-search_input" autocomplete="off" placeholder="Search">
            <button class="btn btn-dark bg-brown" id="hoadon-btn_search"><i class="fa fa-search"></i></button>
        </div>
    </div>
    <div id="hoadon-search_result"></div>
    <div id="hoadon-table_show"></div>

    <div class="modal fade" id="hoadon-modal_delete" tabindex="-1" aria-labelledby="detail_modal" aria-hidden="true">
        <div class="modal-dialog w-75">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h3 class="modal-title" id="exampleModallabel">Xóa hóa đơn</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa thông tin hóa đơn <span class="h4 fw-bold" id="mahd_delete"></span></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="hoadon-btn_delete">Delete</button>
                    <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

    
    <script>
        var text = 'MAHD';
        var giamgia = 0;
        $(document).on("click", '.page-item', function() {
            let page = $(this).attr("id");
            showData(page);
        })

        $(document).ready(function (){
            showData();
            $('#hoadon-search_input').on('keyup', function (e){
                e.preventDefault();
                let search_input = $('#hoadon-search_input').val();
                if(search_input != ""){
                    $.ajax({
                        url: '/php_tur/QLBH_CF/Hoadon/search/',
                        method: 'POST',
                        data: {pattern: search_input},
                        success: function (data){
                            //$('#hoadon-search_result').html(data);
                            $('#hoadon-table_show').html(data);
                        }
                    })
                } else {
                    showData();
                }
            })
        });
        
        function showData(page){
            $.post('/php_tur/QLBH_CF/Hoadon/getList/', {page: page, text: text, filter: 'asc'}, (data) => {
                $('#hoadon-table_show').html(data);
            })
        }

        function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/Hoadon/getList/', {text: text, filter: filter}, (data) => {
                $('#hoadon-table_show').html(data);
            })
        }

        $('#hoadon-select_orderby').on('change', function() {
            text = $('#hoadon-select_orderby').val();
            orderBy(text, 'asc');
        })

        $(document).on('click','.asc',function() {
            orderBy(text, 'asc');
        })

        $(document).on('click','.desc',function() {
            orderBy(text, 'desc');
        })

        $(document).on('click','.btn-detail', function() {
            let id = $(this).attr('id');
            console.log('/php_tur/QLBH_CF/Hoadon/getDetail/'+id)
            $.get('/php_tur/QLBH_CF/Hoadon/getDetail/'+id, {}, (data) => {
                $('#hoadon-page').html(data);
            })

        })

        $(document).on('click','.btn-delete',function() {
            let mahd_del = $(this).attr('id');
            console.log(mahd_del)
            $('#mahd_delete').text(mahd_del);
            $('#hoadon-modal_delete').modal('show');

        })

        $(document).on('click','#hoadon-btn_delete',function() {
            let mahd_del = $('#mahd_delete').text();
            $.ajax({
                type: "post",
                url: '/php_tur/QLBH_CF/Hoadon/destroy/' + mahd_del,
                data: { },
                success: function (data) {
                    console.log(data['status'])
                    $('#hoadon-modal_delete').modal('hide');
                    showData();
                    $('#toast-text').text('Delete successfully');
                    const toastSucc = new bootstrap.Toast($('#toast-success'));
                    toastSucc.show();
                }
            })
        })
    </script>