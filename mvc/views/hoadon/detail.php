<h1 class="text-center text-brown">CHI TIET HOA DON <?php echo $data['id']; ?></h1>
<div class="d-flex my-2 align-items-center">
    <a href="/php_tur/QLBH_CF/Hoadon" class="me-3 link text-brown btn">
        <i class="fa-solid fa-chevron-left"></i>
        Back
    </a>
</div>
<div id="cthd-table_show">
    <table class="table mx-auto" id="cthd-table">
        <thead class="bg-brown text-white">
            <tr>
                <td>Ma SP</td>
                <td>So Luong</td>
                <td>Gia</td>
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