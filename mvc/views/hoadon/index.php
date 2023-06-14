<div id="hoadon-page">
    <h1 class="text-center text-brown">HOA DON</h1>
    <div class="d-flex my-2 justify-content-between">
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
                    <h3 class="modal-title" id="exampleModallabel">Xoa hoa don</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ban co muon xoa thong tin hoa don <span class="h4 fw-bold" id="mahd_delete"></span></p>
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
        var giamgia = 0;
        $(document).on("click", '.page-item', function() {
            let page = $(this).attr("id");
            //showData(page);
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
        
        function showData(){
            $.get('/php_tur/QLBH_CF/Hoadon/getList/', {}, (data) => {
                $('#hoadon-table_show').html(data);
            })
        }

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