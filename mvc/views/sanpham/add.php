<div class="modal fade" id="sanpham-modal" tabindex="-1" aria-labelledby="add_modal" aria-hidden="true">
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sanpham-form" >
                    <div class="form-group mb-2" id="masp-input">
                        <label for="masp">Ma san pham</label>
                        <input type="text" name="masp" id="masp" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tensp">Ten san pham</label>
                        <input type="text" name="tensp" id="tensp" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="gia">Gia</label>
                        <input type="number" name="gia" id="gia" class="form-control">
                    </div>
                    <table class="w-75">
                        <tr class="form-group align-items-center">
                            <td><label for="size" class="me-2">Size</label></td>
                            <td>
                                <select name="size" id="size" class="form-select">
                                    <option selected value="">Chon Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="form-group align-items-center">
                            <td><label for="nhomloai" class="me-2">Nhom loai</label></td>
                            <td>
                                <select name="nhomloai" id="nhomloai" class="form-select">
                                    <option selected>Chon Nhom loai</option>
                                    <option value="Coffee">Coffee</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Juice">Juice</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="bg-brown btn btn-dark" id="sanpham-btn"><span id='sanpham-btn_text'></span></button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>