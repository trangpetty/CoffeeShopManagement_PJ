<div class="modal fade" id="sochamcong-modal" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex" id="exampleModalLabel">Thêm công mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sochamcong-form" class="row">
                    <div class="form-group my-2">
                        <label for="manv">Mã nhân viên <span class="text-danger">*</span></label>
                        <input type="text" name="manv" id="manv" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ngaydilam">Ngày đi làm <span class="text-danger">*</span></label>
                        <input type="date" name="ngaydilam" id="ngaydilam" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="calam">Ca làm <span class="text-danger">*</span></label>
                        <select name="calam" id="calam" class="form-select">
                            <option selected>Chọn ca</option>
                            <option value="S">Sáng</option>
                            <option value="C">Chiều</option>
                            <option value="T">Tối</option>
                        </select>
                    </div>
                    <p class="text-danger mb-0 mt-2" id="text-err"></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="bg-brown btn btn-dark" id="sochamcong-btn">Add</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

