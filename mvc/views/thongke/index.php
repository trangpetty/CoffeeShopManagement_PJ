<h1 class="text-center text-brown">THỐNG KÊ</h1>
<div class="d-flex">
    <canvas id="myChart" style="width:100%;max-width:600px" class="mb-3"></canvas>
    <div class="w-50">
        <div class="d-flex justify-content-between mb-2 w-100">
            <h3>Top 3 Sản phẩm bán chạy</h3>
            <select name="select_top_product" id="select_top_product" class="form-select" style="width: 8rem;height: 2.5rem;">
                <option value="day">Ngày</option>
                <option value="month">Tháng</option>
            </select>
        </div>
        <div id="top_products"></div>
    </div>
</div>

<hr>
<div class="d-flex justify-content-between mb-2">
    <h3>Doanh thu</h3>
    <select name="select_time" id="select_time" class="form-select" style="width: 8rem;height: 2.5rem;">
        <option value="day">Ngày</option>
        <option value="month">Tháng</option>
    </select>
</div>
<div id="doanhthu"></div>
</div>


<script>
    var yValues = [0,0,0,0,0,0,0,0,0,0,0,0];
    const xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    $(document).ready(function (){
            showTopSP();
            showDoanhthu();
            showChart();
        });
    function showTopSP(){
        $.post('/php_tur/QLBH_CF/Thongke/getTopSP', {}, (data) => {
            $('#top_products').html(data);
        })
    }

    function showDoanhthu(){
        $.get("/php_tur/QLBH_CF/Thongke/getDoanhthu", {}, (data) => {
            $('#doanhthu').html(data);
        })
    }

    function showChart(){
        $.get("/php_tur/QLBH_CF/Thongke/getDoanhso", {}, (data) => {
            const xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            var yValues = [];
            for(let i = 1; i <= 12; i++) {
                yValues[i-1] = JSON.parse(data)[i];
            }
            console.log(yValues)
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#724e2c",
                        borderColor: "rgba(114,78,44,0.1)",
                        data: yValues
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                        yAxes: [{ticks: {min: 0, max:1000000}}],
                    }
                }
            });
        })        
    }

    $('#select_time').on('change', function() {
        if ($('#select_time').val() == 'day') {
            $.get('/php_tur/QLBH_CF/Thongke/getDoanhthu', {}, (data) => {
                $('#doanhthu').html(data);
            })
        }
        else {
            $.get('/php_tur/QLBH_CF/Thongke/getDoanhthuMonth', {}, (data) => {
                $('#doanhthu').html(data);
            })
        }
    })

    $('#select_top_product').on('change', function() {
        if ($('#select_top_product').val() == 'month') {
            $.get('/php_tur/QLBH_CF/Thongke/getTopSP', {}, (data) => {
                $('#top_products').html(data);
            })
        }
        else {
            $.get('/php_tur/QLBH_CF/Thongke/getTopSPDay', {}, (data) => {
                $('#top_products').html(data);
            })
        }
    })
    
</script>