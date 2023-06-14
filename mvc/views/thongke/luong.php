<h1 class="text-center text-brown">LUONG NHAN VIEN THANG <?php echo date('m') ?></h1>

<div class="d-flex float-end mb-3 align-items-center" style="width:150px;">
    <p class="mx-2 my-0">Chon thang</p>
    <select id="select-month">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
</div>
<table class="table mx-auto" id="luong-table">
    <thead class="bg-brown text-white">
        <tr>
            <td>Ma NV</td>
            <td>Ho ten NV</td>
            <td>So cong</td>
            <td>Luong ca</td>
            <td>Luong</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($data['luong'])) { 
        ?>
        <tr>            
            <td><?php echo $row['MANV']?></td>
            <td><?php echo $row['HONV'].' '.$row['TENNV']?></td>
            <td><?php echo $row['socong'] ?></td>
            <td><?php echo $row['LUONGCA']?></td>
            <td><?php echo $row['luong']?></td>            
        </tr>
        <?php }?>
    </tbody>
</table>
<script>
    const d = new Date();
    let month = d.getMonth() + 1;
    $('#select-month').val(month);
    $('#select-month').on('change', function () {
        month = $('#select-month').val();
        $.get('/php_tur/QLBH_CF/Thongke/luongMonth', {month: month}, (data) => {
            
        })
    })
</script>

