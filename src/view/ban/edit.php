<div class="modal fade" id="ban-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua ban
                    <input type="text" name="maban_edit" id="maban_edit" class="form-control w-25 border-0 fw-bold" style="font-size:1.75rem;" readonly>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ban-form_edit">
                    <div class="form-group">
                        <label for="khuvuc_edit">Khu vuc</label>
                        <input type="text" name="khuvuc_edit" id="khuvuc_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phuthu_edit">Phu thu</label>
                        <input type="text" name="phuthu_edit" id="phuthu_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="trangthai">Trang thai</label>
                        <input type="checkbox" name="trangthai" id="trangthai">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark bg-brown" id="ban-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="ban-hidden-data">
            </div>
        </div>
    </div>
</div>