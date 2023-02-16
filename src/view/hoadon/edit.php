<div class="modal fade" id="hoadon-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua hoa don
                    <input type="text" name="mahd_edit" id="mahd_edit" class="form-control w-25 border-0 fw-bold text-brown" style="font-size:1.75rem;" readonly>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="hoadon-form_edit">
                    <div class="form-group">
                        <label for="manvhd_edit">MA NV</label>
                        <select name="manvhd_edit" id="manvhd_edit" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="sothehd_edit">SO THE</label>
                        <select name="sothehd_edit" id="sothehd_edit" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="nlhd_edit">NGAY LAP HD</label>
                        <input type="date" name="nlhd_edit" id="nlhd_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="glhd_edit">GIO LAP HD</label>
                        <input type="time" name="glhd_edit" id="glhd_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="giamgiahd_edit">GIAM GIA</label>
                        <input type="number" name="giamgiahd_edit" id="giamgiahd_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="makmhd_edit">MA KM</label>
                        <select name="makmhd_edit" id="makmhd_edit" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="mabanhd_edit">MA BAN</label>
                        <select name="mabanhd_edit" id="mabanhd_edit" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="chuthich_edit">CHU THICH</label>
                        <input type="text" name="chuthich_edit" id="chuthich_edit" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark bg-brown" id="hoadon-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="hoadon-hidden-data">
            </div>
        </div>
    </div>
</div>

<script>
    $.ajax({
        url: "../../controller/hoadon/show.php",
        type: "get",
        data: {
            manvhd_edit: "true"
        },
        success: function (data) {
            $('#manvhd_edit').html(data);
        }
    });

    $.ajax({
        url: "../../controller/hoadon/show.php",
        type: "get",
        data: {
            sothehd_edit: "true"
        },
        success: function (data) {
            $('#sothehd_edit').html(data);
        }
    });

    $.ajax({
        url: "../../controller/hoadon/show.php",
        type: "get",
        data: {
            makmhd_edit: "true"
        },
        success: function (data) {
            $('#makmhd_edit').html(data);
        }
    });

    $.ajax({
        url: "../../controller/hoadon/show.php",
        type: "get",
        data: {
            mabanhd_edit: "true"
        },
        success: function (data) {
            $('#mabanhd_edit').html(data);
        }
    });
</script>