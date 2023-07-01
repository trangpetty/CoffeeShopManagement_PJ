<table class="table mx-auto" id="hoadon-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Mã HD</td>
            <td>Mã NV</td>
            <td>Hội Viên</td>
            <td>Ngày lập HD</td>
            <td>Giờ lập HD</td>
            <td>Giảm</td>
            <td>Chú thích</td>
            <td>Thao tác</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['data'])) { ?>
                <tr>
                    <td><?php echo $row['MAHD']?></td>
                    <td><?php echo $row['MANV']?></td>
                    <td><?php echo $row['SOTHE']?></td>
                    <td><?php echo $row['NGAYLAPHD']?></td>
                    <td><?php echo $row['GIOLAPHD']?></td>
                    <td><?php echo $row['GIAMGIA']?></td>
                    <td><?php echo $row['chuthich']?></td>
                    <td>
                        <button class="btn btn-info btn-detail" id="<?php echo $row['MAHD']?>"><i class="fa-solid fa-circle-info text-white"></i></button>
                        <button class="btn btn-danger btn-delete" id="<?php echo $row['MAHD']?>"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            <?php }
        ?>
    </tbody>
</table>
<?php
    if(isset($data['display'])) {
        echo $data['display']; 
    } 
?>
