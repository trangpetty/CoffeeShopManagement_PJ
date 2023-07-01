<table class="table mx-auto table-striped text-center" id="hoivien-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Số thẻ</td>
            <td>Họ tên</td>
            <td>Ngày sinh</td>
            <td>Điểm tích lũy</td>
            <td>Loại hội viên</td>
            <td>Thao tác</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['data'])) {                 
        ?>
        <tr>
            <td><?php echo $row['SOTHE']?></td>
            <td><?php echo $row['TENHV']?></td>
            <td><?php echo $row['NGAYSINH'] ?></td>
            <td><?php echo $row['DIEMTL']?></td>
            <td><?php echo $row['LOAIHV']?></td>
            <td>
                <button class="btn btn-info btn-detail" id="<?php echo $row['SOTHE']?>"><i class="fa-solid fa-circle-info text-white"></i></button>
                <button class="btn bg-brown btn-dark btn-edit" id="<?php echo $row['SOTHE']?>"><i class="fa-regular fa-pen-to-square"></i></button>
                <button class="btn btn-danger btn-delete" id="<?php echo $row['SOTHE']?>"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?php
    if(isset($data['display'])) {
        echo $data['display']; 
    } 
?>
