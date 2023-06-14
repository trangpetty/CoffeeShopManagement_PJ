<table class="table mx-auto table-striped text-center" id="nhanvien-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Ma NV</td>
            <td>Ho ten NV</td>
            <td>Gioi tinh</td>
            <td>Chuc vu</td>
            <td>Luong ca</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['nhanvien'])) { 
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

<script>
    function orderBy(text, filter) {
            $.post('/php_tur/QLBH_CF/Nhanvien/getList/', {text: text, filter: filter}, (data) => {
                $('#nhanvien-table_show').html(data);
            })
        }
    $('input[type="checkbox"]').click(function() {
            let id = $(this).attr('name');
            console.log(id)
            arr.push(id);
        })

    $('#btn-delete_arr').click(function() {
        console.log(arr)
        $.post('/php_tur/QLBH_CF/Nhanvien/deleteArr/', {arr: arr}, function(data) {
            $('#nhanvien-modal_deleteArr').modal('hide');
            orderBy('MANV', 'ASC');
        })
    })
</script>