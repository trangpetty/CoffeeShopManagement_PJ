<div class="modal fade" id="nhanvien-modal" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nhanvien-form" class="row">
                    <div class="col border-end">
                        <div class="form-group my-2" id="manv-input">
                            <label for="manv">Mã nhân viên <span class="text-danger">*</span></label>
                            <input type="text" name="manv" id="manv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="honv">Họ <span class="text-danger">*</span></label>
                            <input type="text" name="honv" id="honv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="tennv">Tên nhân viên <span class="text-danger">*</span></label>
                            <input type="text" name="tennv" id="tennv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="gioitinh">Giới tính <span class="text-danger">*</span></label>
                            <input type="radio" name="gioitinh" value="1"> Nam
                            <input type="radio" name="gioitinh" value="0"> Nữ
                        </div>
                        <div class="form-group my-2">
                            <label for="ngaysinhnv">Ngày sinh <span class="text-danger">*</span></label>
                            <input type="date" name="ngaysinhnv" id="ngaysinhnv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="noisinh">Nơi sinh</label>
                            <input type="text" name="noisinh" id="noisinh" class="form-control">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group my-2">
                            <label for="diachinv">Dịa chỉ</label>
                            <input type="text" name="diachinv" id="diachinv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="sdtnv">Số điện thoại</label>
                            <input type="text" name="sdtnv" id="sdtnv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="nbdl">Ngày bắt đầu làm</label>
                            <input type="date" name="nbdl" id="nbdl" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="scccdnv">Số CCCD</label>
                            <input type="text" name="scccdnv" id="scccdnv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="chucvu">Chức vụ <span class="text-danger">*</span></label>
                            <select name="chucvu" id="chucvu" class="form-select ms-2">
                                <option selected>Chọn chức vụ</option>
                                <option value="Thu ngan">Thu ngân</option>
                                <option value="Boi ban">Bồi bàn</option>
                                <option value="Pha che">Pha chế</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="luongca">Lương ca <span class="text-danger">*</span></label>
                            <select name="luongca" id="luongca" class="form-select ms-2">
                                <option selected>Chọn lương ca</option>
                                <option value="20000">20000</option>
                                <option value="25000">25000</option>
                                <option value="30000">30000</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="bg-brown btn btn-dark" id="nhanvien-btn"><span id='nhanvien-btn_text'></span></button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>