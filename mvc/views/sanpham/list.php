<table class="table mx-auto table-striped text-center" id="sanpham-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Ma SP</td>
            <td>Ten SP</td>
            <td>Gia</td>
            <td>Size</td>
            <td>Nhom loai</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['sanpham'])) { 
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

<script>
    function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/Sanpham/getList/', {text: text, filter: filter}, (data) => {
                $('#sanpham-table_show').html(data);
            })
        }
    $('input[type="checkbox"]').click(function() {
            let id = $(this).attr('name');
            console.log(id)
            arr.push(id);
        })

    $('#btn-delete_arr').click(function() {
        console.log(arr)
        $.post('/php_tur/QLBH_CF/Sanpham/deleteArr/', {arr: arr}, function(data) {
            $('#sanpham-modal_deleteArr').modal('hide');
            orderBy('MASP', 'ASC');
        })
    })
</script>