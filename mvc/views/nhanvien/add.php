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
                            <label for="manv">Ma nhan vien</label>
                            <input type="text" name="manv" id="manv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="honv">Ho</label>
                            <input type="text" name="honv" id="honv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="tennv">Ten nhan vien</label>
                            <input type="text" name="tennv" id="tennv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="gioitinh">Gioi tinh</label>
                            <input type="radio" name="gioitinh" value="1"> Nam
                            <input type="radio" name="gioitinh" value="0"> Nu
                        </div>
                        <div class="form-group my-2">
                            <label for="ngaysinhnv">Ngay sinh</label>
                            <input type="date" name="ngaysinhnv" id="ngaysinhnv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="noisinh">Noi sinh</label>
                            <input type="text" name="noisinh" id="noisinh" class="form-control">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group my-2">
                            <label for="diachinv">Dia chi</label>
                            <input type="text" name="diachinv" id="diachinv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="sdtnv">So dien thoai</label>
                            <input type="text" name="sdtnv" id="sdtnv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="nbdl">Ngay bat dau lam</label>
                            <input type="date" name="nbdl" id="nbdl" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="scccdnv">So CCCD</label>
                            <input type="text" name="scccdnv" id="scccdnv" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="chucvu">Chuc vu</label>
                            <select name="chucvu" id="chucvu" class="form-select ms-2">
                                <option selected>Chon chuc vu</option>
                                <option value="Thu ngan">Thu ngan</option>
                                <option value="Boi ban">Boi ban</option>
                                <option value="Pha che">Pha che</option>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="luongca">Luong ca</label>
                            <select name="luongca" id="luongca" class="form-select ms-2">
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
                <button type="submit" class="bg-brown btn btn-dark" id="nhanvien-btn"><span id='nhanvien-btn_text'></span></button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>