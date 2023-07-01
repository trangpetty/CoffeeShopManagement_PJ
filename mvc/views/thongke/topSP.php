<table class="table mx-auto">
    <thead class="bg-brown text-white">
    <tr>
        <td>Mã SP</td>
        <td>Tên SP</td>
        <td>Size</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Đơn giá</td>
    </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($data['topSP'])) { ?>
            <tr>
                <td><?php echo $row['MASP']; ?></td>
                <td><?php echo $row['TENSP']; ?></td>
                <td><?php echo $row['SIZE']; ?></td>
                <td><?php echo $row['so_luong']; ?></td>
                <td><?php echo $row['GIA']; ?></td>
                <td><?php echo $row['don_gia']; ?></td>
            </tr>
           <?php } ?>
    </tbody>
</table>