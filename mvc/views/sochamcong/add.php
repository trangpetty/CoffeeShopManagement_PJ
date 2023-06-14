<div class="modal fade" id="sochamcong-modal" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex" id="exampleModalLabel">Them cong moi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sochamcong-form" class="row">
                    <div class="form-group my-2">
                        <label for="manv">Ma nhan vien</label>
                        <input type="text" name="manv" id="manv" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ngaydilam">Ngay di lam</label>
                        <input type="date" name="ngaydilam" id="ngaydilam" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="calam">Ca lam</label>
                        <select name="calam" id="calam" class="form-select">
                            <option selected>Chon ca</option>
                            <option value="S">S</option>
                            <option value="C">C</option>
                            <option value="T">T</option>
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

