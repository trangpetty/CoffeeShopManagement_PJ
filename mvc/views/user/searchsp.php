<?php while ($row = mysqli_fetch_assoc($data['sanpham'])) {?>
<div id="sanpham-<?php echo $row['MASP'] ?>" class="w-25">
    <h5 class="border-bottom"><?php echo $row['NHOMLOAI'] ?></h5>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['TENSP'].' '.$row['SIZE'] ?></h5>
            <p class="card-text">
                <?php echo $row['GIA'] ?>
                <input id="soluong-<?php echo $row['MASP']?>" type="number" min="1" class="form-control w-50 mx-auto" value="0">
            </p>
            <button class="btn btn-dark bg-brown btn-select" id="<?php echo $row['MASP'].'-'.$row['TENSP'].'-'.$row['SIZE'].'-'.$row['GIA']?>">Select</button>
        </div>
    </div>
</div>
<?php } ?>