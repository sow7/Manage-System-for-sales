<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/system.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/data.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <!-- Additional files for the Highslide popup effect -->
        <script type="text/javascript" src="http://www.highcharts.com/media/com_demo/highslide-full.min.js"></script>
        <script type="text/javascript" src="http://www.highcharts.com/media/com_demo/highslide.config.js" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="http://www.highcharts.com/media/com_demo/highslide.css" />
        <script src="js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            var amount0 = "<?php
$con = mysql_connect("localhost:3307", "root", "root");
mysql_select_db("test", $con);
$rankcategory = mysql_query("select p.category, sum(t.quantity*p.price) from products p, transactions t where p.product_id=t.product_id group by p.category order by sum(t.quantity*p.price) DESC");
$i = 0;
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var name0 = "<?php
echo $row['category'];
?>";
            var amount1 = "<?php
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var name1 = "<?php
echo $row['category'];
?>";
            var amount2 = "<?php
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var name2 = "<?php
echo $row['category'];
?>";
            var amount3 = "<?php
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var name3 = "<?php
echo $row['category'];
?>";
            var amount4 = "<?php
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var name4 = "<?php
echo $row['category'];
?>";
            var amount5 = "<?php
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var name5 = "<?php
echo $row['category'];
?>";
            var amount6 = "<?php
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var name6 = "<?php
echo $row['category'];
mysql_close($con);
?>";
            google.load('visualization', '1', {packages: ['corechart', 'bar']});
            google.setOnLoadCallback(drawBasic);
            function drawBasic() {
                var data = google.visualization.arrayToDataTable([
                    ['Product', 'Amount', {role: 'style'}],
                    [name0.toString(), parseInt(amount0), "#EF5350"],
                    [name1.toString(), parseInt(amount1), "FF5252"],
                    [name2.toString(), parseInt(amount2), "FF9800"],
                    [name3.toString(), parseInt(amount3), "FFA726"],
                    [name4.toString(), parseInt(amount4), "FFFF00"],
                    [name5.toString(), parseInt(amount5), "00B0FF"],
                    [name6.toString(), parseInt(amount6), "18FFFF"]
                ]);
                var options = {
                    title: ' ',
                    chartArea: {width: '70%', height: '1000'},
                    hAxis: {
                        title: ' ',
                        minValue: 0
                    },
                    vAxis: {
                        title: ' '
                    }
                };
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
            var randomScalingFactor = function () {
                return Math.round(Math.random() * 100)
            };
            var month = new Array(12);
<?php
$con = mysql_connect("localhost:3307", "root", "root");
mysql_select_db("test", $con);
?>
            month[0] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=1 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[1] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=2 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[2] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=3 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[3] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=4 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[4] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=5 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[5] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=6 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[6] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=7 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[7] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=8 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[8] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=9 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[9] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=10 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[10] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=11 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            month[11] = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t where month(t.`date`)=12 AND t.product_id=p.product_id");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var lineChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [month[0], month[1], month[2], month[3], month[4], month[5], month[6], month[7], month[8], month[9], month[10], month[11]]
                    }
                ]
            }
            window.onload = function () {
                var ctx = document.getElementById("Total").getContext("2d");
                window.myLine = new Chart(ctx).Line(lineChartData, {
                    responsive: true
                });
            }
//radar chart
            var China = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t, region r, store s where r.region_name='China' and t.store_id=s.store_id and s.region_id=r.region_id and t.product_id=p.product_id;");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var Italy = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t, region r, store s where r.region_name='Italy' and t.store_id=s.store_id and s.region_id=r.region_id and t.product_id=p.product_id;");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";
            var USA = "<?php
$rankcategory = mysql_query("select sum(t.quantity*p.price) from products p, transactions t, region r, store s where r.region_name='USA' and t.store_id=s.store_id and s.region_id=r.region_id and t.product_id=p.product_id;");
$row = mysql_fetch_array($rankcategory);
echo (int) intval($row['sum(t.quantity*p.price)']);
?>";

            var radarChartData = {
                labels: ["China", "USA", "Italy"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#E3F2FD",
                        pointHighlightFill: "#2196F3",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [China, USA, Italy]
                    }
                ]
            };
//barchart
            var randomScalingFactor = function () {
                return Math.round(Math.random() * 100)
            };
            var barChartData = {
                labels: ["Biz1", "Biz2", "Biz3", "Biz4", "Biz5"],
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(220,220,220,0.75)",
                        highlightStroke: "rgba(220,220,220,1)",
                        data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                    }
                ]
            }
//display
            window.onload = function () {
                var ctx = document.getElementById("Total").getContext("2d");
                window.myLine = new Chart(ctx).Line(lineChartData, {
                    responsive: true
                });
                window.myRadar = new Chart(document.getElementById("rada").getContext("2d")).Radar(radarChartData, {
                    responsive: true
                });
                window.myBar = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData, {
                    responsive: true
                });
            }
        </script>
        <title>Sales system - Analysis</title>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php">Transaction</a>
                        </li>
                        <li>
                            <a href="product.php">Product</a>
                        </li>
                        <li>
                            <a href="Customer.php">Customer</a>
                        </li>
                        <li class="active">
                            <a href="analysis.php">Analysis</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown" href="#">Store
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="shopchoose.php">Region</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <!--header-->
            <div class="page-header">
                <h1>Sales Analysis</h1>
            </div>
            <blockquote>
                <em>This page shows some basic information about our sales system.<br />
                    It can help you to adjust your business decision based on total sale, product rank and daliy sales information here.</em>
            </blockquote>
            <div style="width:100%; height:420px;">	
                <div style="width:45%; float:right;">
                    <h4 style="margin-left:10px;">Top 7 Product Category <span class="label label-info">2015</span></h4>
                    <div style="margin-top:20px; height:300px;" id="chart_div">
                    </div>
                </div>
                <div style="width:35%; float:left;">
                    <h4>Total Sale <span class="label label-info">2015</span></h4>
                    <div style="margin-top:20px;">
                        <canvas id="Total" height="850" width="1000"></canvas>
                    </div>
                </div>
            </div>
            <div style="width:45%; float:right;">
                <h4 style="margin-left:10px;">Business Buyers Rank</h4>
                <canvas id="bar" height="450" width="600"></canvas>
            </div>
            <div style="width:35%; float:left;">
                <h4>Region Sale Compare<span class="label label-info">2015</span></h4>
                <div style="margin-top:20px;">
                    <canvas id="rada" height="850" width="1000"></canvas>
                </div>
            </div>
        </div>
    </body>
</html>
