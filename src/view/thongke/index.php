<?php
    include '../layout/header.php';
?>
    <div class="container">
        <h1 class="text-center text-brown">THONG KE</h1>

        <div class="d-flex">
            <canvas id="myChart" style="width:100%;max-width:600px" class="mb-3"></canvas>
            <div id="top_products" class="w-50"></div>
        </div>

        <hr>
        <div id="doanhthu"></div>
    </div>

<script>
    $(document).ready(function (){
            showTopSP();
            showDoanhthu();
            showChart();
        });
        function showTopSP(){
            $.ajax({
                url: "../../controller/thongke/show.php",
                type: "get",
                data: {
                    top_sanpham: "true"
                },
                success: function (data,status) {
                    $('#top_products').html(data);
                }
            });
        }

        function showDoanhthu(){
            $.ajax({
                url: "../../controller/thongke/show.php",
                type: "get",
                data: {
                    doanhthu: "true"
                },
                success: function (data,status) {
                    $('#doanhthu').html(data);
                }
            });
        }

    function showChart(){
        var xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        var yValues = [];
        for(var i = 1; i <= 12; i++){
            $.ajax({
                url: "../../controller/thongke/show.php",
                type: "get",
                data: {
                    doanhso: "true",
                    month_doanhso: i
                },
                success: function (data,status) {
                    if(isNaN(parseInt(data))){
                        yValues.push(0);
                    }
                    else {
                        yValues.push(parseInt(data));

                    }
                    // console.log(yValues);
                }
            });
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
    }
</script>
