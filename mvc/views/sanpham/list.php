<table class="table mx-auto table-striped text-center" id="sanpham-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Mã SP</td>
            <td>Tên SP</td>
            <td>Giá</td>
            <td>Size</td>
            <td>Nhóm loại</td>
            <td>Thao tác</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['data'])) { 
        ?>
        <tr>            
            <td><?php echo $row['MASP']?></td>
            <td><?php echo $row['TENSP']?></td>
            <td><?php echo $row['GIA'] ?></td>
            <td><?php echo $row['SIZE']?></td>
            <td><?php echo $row['NHOMLOAI']?></td>
            <td>                
                <button class="btn bg-brown btn-dark btn-edit" id="<?php echo $row['MASP']?>"><i class="fa-regular fa-pen-to-square"></i></button>
                <button class="btn btn-danger btn-delete" id="<?php echo $row['MASP']?>"><i class="fa-solid fa-trash-can"></i></button>
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
