<div class="modal fade" id="nhanvien-modal_add" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Them nhan vien moi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nhanvien-form_add" class="row">
                    <div class="col border-end">
                        <div class="form-group my-2">
                            <label for="manv_add">Ma nhanvien</label>
                            <input type="text" name="manv_add" id="manv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="honv_add">Ho</label>
                            <input type="text" name="honv_add" id="honv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="tennv_add">Ten nhan vien</label>
                            <input type="text" name="tennv_add" id="tennv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="gioitinh_add">Gioi tinh</label>
                            <input type="radio" name="gioitinh_add" value="1"> Nam
                            <input type="radio" name="gioitinh_add" value="0"> Nu
                        </div>
                        <div class="form-group my-2">
                            <label for="ngaysinhnv_add">Ngay sinh</label>
                            <input type="date" name="ngaysinhnv_add" id="ngaysinhnv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="noisinh_add">Noi sinh</label>
                            <input type="text" name="noisinh_add" id="noisinh_add" class="form-control">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group my-2">
                            <label for="diachinv_add">Dia chi</label>
                            <input type="text" name="diachinv_add" id="diachinv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="sdtnv_add">So dien thoai</label>
                            <input type="text" name="sdtnv_add" id="sdtnv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="nbdl_add">Ngay bat dau lam</label>
                            <input type="date" name="nbdl_add" id="nbdl_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="scccdnv_add">So CCCD</label>
                            <input type="text" name="scccdnv_add" id="scccdnv_add" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="chucvu_add">Chuc vu</label>
                            <select name="chucvu_add" id="chucvu_add" class="form-select ms-2">
                                <option selected>Chon chuc vu</option>
                                <option value="Thu ngan">Thu ngan</option>
                                <option value="Boi ban">Boi ban</option>
                                <option value="Pha che">Pha che</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="luongca_add">Luong ca</label>
                            <select name="luongca_add" id="luongca_add" class="form-select ms-2">
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
                <button type="submit" class="bg-brown btn btn-dark" id="nhanvien-btn_add">Add</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>