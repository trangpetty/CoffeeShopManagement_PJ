<table class="table mx-auto" id="hoadon-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Ma HD</td>
            <td>Ma NV</td>
            <td>Hoi Vien</td>
            <td>Ngay lap HD</td>
            <td>Gio lap HD</td>
            <td>Giam</td>
            <td>Ma KM</td>
            <td>Ma Ban</td>
            <td>Chu thich</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['hoadon'])) { ?>
                <tr>
                    <td><?php echo $row['MAHD']?></td>
                    <td><?php echo $row['MANV']?></td>
                    <td><?php echo $row['SOTHE']?></td>
                    <td><?php echo $row['NGAYLAPHD']?></td>
                    <td><?php echo $row['GIOLAPHD']?></td>
                    <td><?php echo $row['GIAMGIA']?></td>
                    <td><?php echo $row['MAKM']?></td>
                    <td><?php echo $row['MABAN']?></td>
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
