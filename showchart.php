<?php
require("chartmodel.php");
require_once("teamModel.php");
$uid = $_SESSION['uid'];
$tid = getTid($uid);
$result = factory($tid);
$counter = 0;
$tmp = 0;
$period = array();
$cfactory = array();
$cdis = array();
$cwhole = array();
$cra = array();
while ($rs = mysqli_fetch_assoc($result)) {
    $tmp += $rs['currentcost'];
    $period[$counter] = $rs['period'];
    $cfactory[$counter] = $tmp;
    $counter++;
}
$p = json_encode($period);
$cf = json_encode($cfactory);
$result = distributor($tid);
$counter = 0;
$tmp = 0;
while ($rs = mysqli_fetch_assoc($result)) {
    $tmp += $rs['currentcost'];
    $cdis[$counter] = $tmp;
    $counter++;
}
$cd = json_encode($cdis);
$result = wholesaler($tid);
$tmp = 0;
$counter = 0;
while ($rs = mysqli_fetch_assoc($result)) {
    $tmp += $rs['currentcost'];
    $cwhole[$counter] = $tmp;
    $counter++;
}
$cw = json_encode($cwhole);
$result = retailer($tid);
$counter = 0;
$tmp = 0;
while ($rs = mysqli_fetch_assoc($result)) {
    $tmp += $rs['currentcost'];
    $cra[$counter] = $tmp;
    $counter++;
}
$cr = json_encode($cra);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
 <div id="container" style="height: 100%"></div>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-gl/echarts-gl.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
       <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/bmap.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/simplex.js"></script>
<script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom, 'light');
var app = {};
option = null;
option = {
    title: {
        text: '統計成本'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['factory','distributor','wholesaler','retailer']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: <?php echo $p; ?>
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'factory',
            type:'line',
            data:<?php echo $cf; ?>
        },
        {
            name:'distributor',
            type:'line',
            data:<?php echo $cd; ?>
        },
        {
            name:'wholesaler',
            type:'line',
            data:<?php echo $cw; ?>
        },
        {
            name:'retailer',
            type:'line',
            data:<?php echo $cr; ?>
        },
    ]
};
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
</script>
</head>

<body>


</body>
</html>
