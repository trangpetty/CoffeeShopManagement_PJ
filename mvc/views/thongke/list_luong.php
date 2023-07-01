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