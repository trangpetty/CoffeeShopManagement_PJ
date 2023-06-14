<table class="table mx-auto table-striped text-center" id="sochamcong-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Ma NV</td>
            <td>Ca</td>
            <td>Ngay lam</td>            
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['sochamcong'])) {                 
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

<script>
    function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/sochamcong/getList/', {text: text, filter: filter}, (data) => {
                $('#sochamcong-table_show').html(data);
            })
    }    
</script>