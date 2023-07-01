<div class="modal fade" id="hoivien-modal" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="hoivien-form">
                    <div class="form-group my-2" id="sothe-input">
                        <label for="sothe">Số thẻ <span class="text-danger">*</span></label>
                        <input type="text" name="sothe" id="sothe" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="tenhv">Tên hội viên <span class="text-danger">*</span></label>
                        <input type="text" name="tenhv" id="tenhv" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="ngaysinhhv">Ngày sinh <span class="text-danger">*</span></label>
                        <input type="date" name="ngaysinhhv" id="ngaysinhhv" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="diachihv">Địa chỉ</label>
                        <input type="text" name="diachihv" id="diachihv" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="sdthv">Số điện thoại</label>
                        <input type="text" name="sdthv" id="sdthv" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="scccdhv">Số CCCD</label>
                        <input type="text" name="scccdhv" id="scccdhv" class="form-control">
                    </div>
                    <div class="form-group my-2" id="diemtl_add">
                        <label for="diemtl">Điểm tích lũy</label>
                        <input type="number" name="diemtl" id="diemtl" class="form-control" min="0" value="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="bg-brown btn btn-dark" id="hoivien-btn"><span id='hoivien-btn_text'></span></button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>