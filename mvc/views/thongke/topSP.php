<div class="d-flex justify-content-between mb-2 w-100">
    <h3>Top 3 San Pham ban chay</h3>
    <select name="select_top_product" id="select_top_product" class="form-select" style="width: 8rem;height: 2.5rem;">
        <option value="day">Day</option>
        <option value="month">Month</option>
    </select>
</div>
<table class="table mx-auto">
    <thead class="bg-brown text-white">
    <tr>
        <td>Ma SP</td>
        <td>TEN SP</td>
        <td>SIZE</td>
        <td>SO LUONG</td>
        <td>GIA</td>
        <td>DON GIA</td>
    </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($data['topSP'])) { ?>
            <tr>
                <td><?php echo $row['MASP']; ?></td>
                <td><?php echo $row['TENSP']; ?></td>
                <td><?php echo $row['SIZE']; ?></td>
                <td><?php echo $row['so_luong']; ?></td>
                <td><?php echo $row['GIA']; ?></td>
                <td><?php echo $row['don_gia']; ?></td>
            </tr>
           <?php } ?>
    </tbody>
</table>