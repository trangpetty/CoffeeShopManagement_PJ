<table class="table mx-auto table-striped text-center" id="sochamcong-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Mã NV</td>
            <td>Ca</td>
            <td>Ngày làm</td>            
            <td>Thao tác</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['data'])) {                 
        ?>
        <tr>
            <td><?php echo $row['MANV']?></td>
            <td><?php echo $row['CALAM']?></td>
            <td><?php echo $row['NGAYDILAM'] ?></td>        
            <td>             
                <button class="btn btn-danger btn-delete" id="<?php echo $row['MANV']."/".$row['CALAM']."/".$row['NGAYDILAM']?>"><i class="fa-solid fa-trash-can"></i></button>
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

