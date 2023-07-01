<h1 class="text-center text-brown">CHI TIẾT HÓA ĐƠN <?php echo $data['id']; ?></h1>
<div class="d-flex my-2 align-items-center">
    <a href="/php_tur/QLBH_CF/Hoadon" class="me-3 link text-brown btn">
        <i class="fa-solid fa-chevron-left"></i>
        Trở về
    </a>
</div>
<div id="cthd-table_show">
    <table class="table mx-auto" id="cthd-table">
        <thead class="bg-brown text-white">
            <tr>
                <td>Mã SP</td>
                <td>Số Lượng</td>
                <td>Giá</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                while ($row = mysqli_fetch_assoc($data['hoadon'])) { ?>
                    <tr>
                        <td><?php echo $row['MASP']?></td>
                        <td><?php echo $row['SOLUONG']?></td>
                        <td><?php echo $row['DONGIA']?></td>
                    </tr>
                <?php }
            ?>
        </tbody>
</div>