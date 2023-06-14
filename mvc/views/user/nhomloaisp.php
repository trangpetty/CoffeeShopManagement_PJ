<h5 class="border-bottom"><?php echo $data['nhomloai'] ?></h5>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
    <?php while ($row = mysqli_fetch_assoc($data['result'])) { ?>
            <div class="carousel-item">
                <div class="card text-center" id="sanpham-<?php echo $row['MASP'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['TENSP'].' '.$row['SIZE'] ?></h5>
                        <p class="card-text">
                            <?php echo $row['GIA'] ?>
                            <input id="soluong-<?php echo $row['MASP'] ?>" type="number" min="1" class="form-control w-50 mx-auto" value="0">
                        </p>
                        <button class="btn btn-dark bg-brown btn-select" id="<?php echo $row['MASP'].'-'.$row['TENSP'].'-'.$row['SIZE'].'-'.$row['GIA']?>">Select</button>
                    </div>
                </div>
            </div>
    <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script>
    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
    var cardWidth = $(".carousel-item").width();
    var scrollPosition = 0;
    $(".carousel-control-next").on("click", function(){
        if(scrollPosition < (carouselWidth - (cardWidth * 4))){
            scrollPosition = scrollPosition + cardWidth;
            $(".carousel-inner").animate({scrollLeft: scrollPosition},600);
        }
    });
    $(".carousel-control-prev").on("click", function(){
        if(scrollPosition > 0){
            scrollPosition = scrollPosition - cardWidth;
            $(".carousel-inner").animate({scrollLeft: scrollPosition},600);
        }
    });
</script>