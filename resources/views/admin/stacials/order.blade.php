@extends('admin.layouts.master')

@section('title', 'Thống kê hàng bán')
@section('title_content', 'Thống kê hàng bán')

@section('content')
   <div class="mb-3">
    <button class="btn btn-sm btn-primary">Xem chi tiết</button>
   </div>
    <div id="piechart" style="width:900px;height:500px">
    </div>

@endsection
@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Thống kê', 'Hàng Bán'],
                <?php
                $totalCart = count($cart);
                $i = 1;
                foreach ($cart as $item) {
                   
                    echo "['" . $item->product->name . "', " . $item->cartquantity . ']' . ',';
                }
                ?>
            ]);

            var options = {
                title: 'Thống kê số lượng hàng bán'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection
