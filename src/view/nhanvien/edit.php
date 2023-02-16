<div class="modal fade" id="nhanvien-modal_edit" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center h2" id="exampleModalLabel">
                    Sua nhanvien
                    <input type="text" name="manv_edit" id="manv_edit" class="form-control w-25 border-0 fw-bold" style="font-size:1.75rem;" readonly>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nhanvien-form_edit" class="row">
                    <div class="col border-end">
                        <div class="form-group my-2">
                            <label for="honv_edit">Ho</label>
                            <input type="text" name="honv_edit" id="honv_edit" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="tennv_edit">Ten nhan vien</label>
                            <input type="text" name="tennv_edit" id="tennv_edit" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="gioitinh_edit">Gioi tinh</label>
                            <input type="radio" name="gioitinh_edit" value="1"> Nam
                            <input type="radio" name="gioitinh_edit" value="0"> Nu
                        </div>
                        <div class="form-group my-2">
                            <label for="ngaysinhnv_edit">Ngay sinh</label>
                            <input type="date" name="ngaysinhnv_edit" id="ngaysinhnv_edit" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="noisinh_edit">Noi sinh</label>
                            <input type="text" name="noisinh_edit" id="noisinh_edit" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="diachinv_edit">Dia chi</label>
                            <input type="text" name="diachinv_edit" id="diachinv_edit" class="form-control">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group my-2">
                            <label for="sdtnv_edit">So dien thoai</label>
                            <input type="text" name="sdtnv_edit" id="sdtnv_edit" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="nbdl_edit">Ngay bat dau lam</label>
                            <input type="date" name="nbdl_edit" id="nbdl_edit" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="scccdnv_edit">So CCCD</label>
                            <input type="text" name="scccdnv_edit" id="scccdnv_edit" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="chucvu_edit">Chuc vu</label>
                            <select name="chucvu_edit" id="chucvu_edit" class="form-select ms-2">
                                <option selected>Chon chuc vu</option>
                                <option value="Thu ngan">Thu ngan</option>
                                <option value="Boi ban">Boi ban</option>
                                <option value="Pha che">Pha che</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="luongca_edit">Luong ca</label>
                            <select name="luongca_edit" id="luongca_edit" class="form-select ms-2">
                                <option selected>Chon luong ca</option>
                                <option value="20000">20000</option>
                                <option value="25000">25000</option>
                                <option value="30000">30000</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark bg-brown" id="nhanvien-btn_edit">Edit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" id="nhanvien-hidden-data">
            </div>
        </div>
    </div>
</div>