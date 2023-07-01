<h1 class="text-center text-brown">LƯƠNG NHÂN VIÊN THÁNG <span id="month"></span></h1>

<div class="d-flex float-end mb-3 align-items-center" style="width:150px;">
    <p class="mx-2 my-0">Chọn tháng</p>
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
<table class="table mx-auto">
    <thead class="bg-brown text-white">
        <tr>
            <td>Mã NV</td>
            <td>Họ tên NV</td>
            <td>Số công</td>
            <td>Lương ca</td>
            <td>Lương</td>
        </tr>
    </thead>
    <tbody id="luong-table">
        
    </tbody>
</table>
<script>
    const d = new Date();
    let month = d.getMonth() + 1;
    $('#select-month').val(month);
    $("#month").text($('#select-month').val())
    function showData () {
        month = $('#select-month').val();
        $.post('/php_tur/QLBH_CF/Thongke/getLuongMonth', {month: month}, (data) => {
            $("#luong-table").html(data);
        })
    }
    showData();
    $('#select-month').on('change', function () {
        month = $('#select-month').val();
        $("#month").text($('#select-month').val())
        $.post('/php_tur/QLBH_CF/Thongke/getLuongMonth', {month: month}, (data) => {
            $("#luong-table").html(data);
        })
    })
</script>

