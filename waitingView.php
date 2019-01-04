<?php
require("teamModel.php");
//checkLogin();
$result=getTeamList();
$rs = mysqli_fetch_assoc($result)
?>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>



<h3>Waiting</h3>
<table class="striped" >
  <tr>
    <td>Team name</td>
    <td>Factory</td>
    <td>Distributor</td>
    <td>Wholesaler</td>
    <td>Retailer</td>
    <td></td>
    <!-- <td><img src="boy.png"></td> -->
  </tr>
<?php
require('dbconfig.php');

$tid = $_GET['tid'];
$tname = $_GET['tname'];
echo "<tr><td>$tname" ;

$p1 = getRole1Img($tid);
$p2 = getRole2Img($tid);
$p3 = getRole3Img($tid);
$p4 = getRole4Img($tid);

$sql = "select * from team where tid=$tid";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt);
$rs = mysqli_fetch_assoc($result);

    if($rs['f'])
        echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p1 . "'></td>";
    else
        echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";
    if($rs['d'] != null)
        echo "<td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p2 . "'></td>";
    else
        echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";
    if($rs['w'] != null)
        echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p3 . "'></td>";
    else
        echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";
    if($rs['r'] != null)
        echo "<td>" , "<img class='circle responsive-img' width='100' height='100' src='data:;base64," . $p4 . "'></td>";
    else
        echo "<td>", "<img class='circle responsive-img' width='100' height='100' src='https://image.flaticon.com/icons/svg/128/128469.svg'></td>";
?>
</table>
    

