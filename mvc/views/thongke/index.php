<h1 class="text-center text-brown">THONG KE</h1>
<div class="d-flex">
    <canvas id="myChart" style="width:100%;max-width:600px" class="mb-3"></canvas>
    <div id="top_products" class="w-50"></div>
</div>

<hr>
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
    
</script>