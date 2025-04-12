<?php 
if (!class_exists('mMuaHang')) {
    include './model/mMuaHang.php';
}

$mMuaHang = new mMuaHang();
$result = $mMuaHang->thongKeMuaHang();

$labels = [];
$datas = [];

foreach ($result as $row) {
    $labels[] = $row['ngaydat'];
    $datas[] = (int)$row['tongSoLuong'];
}

$label_json = json_encode($labels);
$data_json = json_encode($datas);
?>

<!-- Giao diện -->
<div class="inner-right">
    <header>
        <h1>Thống kê mua hàng</h1>
    </header>
    <canvas id="canvas" height="450" width="610"></canvas>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js@1.0.2/Chart.min.js"></script>

<script>
    var lineChartData = {
        labels: <?php echo $label_json; ?>,
        datasets: [{
            label: "Số lượng mua",
            fillColor: "rgba(219, 110, 110, 0.3)",
            strokeColor: "skyblue",
            pointColor: "#ccc",
            pointStrokeColor: "#fff",
            data: <?php echo $data_json; ?>
        }]
    };

    var ctx = document.getElementById("canvas").getContext("2d");
    var myLineChart = new Chart(ctx).Line(lineChartData, {
        scaleFontSize: 13,
        scaleFontColor: "#ffa45e"
    });
</script>
