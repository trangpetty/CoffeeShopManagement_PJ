<table class="table mx-auto table-striped text-center" id="nhanvien-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Mã NV</td>
            <td>Họ tên NV</td>
            <td>Giới tính</td>
            <td>Chức vụ</td>
            <td>Lương ca</td>
            <td>Thao tác</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['data'])) { 
                if($row['GIOITINH'] == 1) $sex = 'Nam';
                else $sex = 'Nu';
        ?>
        <tr>
            <td><?php echo $row['MANV']?></td>
            <td><?php echo $row['HONV'].' '.$row['TENNV']?></td>
            <td><?php echo $sex ?></td>
            <td><?php echo $row['CHUCVU']?></td>
            <td><?php echo $row['LUONGCA']?></td>
            <td>
                <button class="btn btn-info btn-detail" id="<?php echo $row['MANV']?>"><i class="fa-solid fa-circle-info text-white"></i></button>
                <button class="btn bg-brown btn-dark btn-edit" id="<?php echo $row['MANV']?>"><i class="fa-regular fa-pen-to-square"></i></button>
                <button class="btn btn-danger btn-delete" id="<?php echo $row['MANV']?>"><i class="fa-solid fa-trash-can"></i></button>
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
