<?php
require("teamModel.php");
//checkLogin();
$result=getTeamList();

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
<title>Team</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<h3>Beer-game</h3>

<table class="striped" >
  <tr>
    <td>Team name</td>
    <td>Factory</td>
    <td>Distributor</td>
    <td>Wholesaler</td>
    <td>Retailer</td>
    <!-- <td><img src="boy.png"></td> -->
  </tr>
<?php

while (	$rs = mysqli_fetch_assoc($result)) {
    $role=$rs['role'];
    echo "<tr><td>" , $rs['name'];
    if($role==1)
        echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='".$rs['imgURL']."'>";
    else
        echo "</td><td></td>";
    if($role==2)
        echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='".$rs['imgURL']."'>";
    else
        echo "</td><td></td>";
    if($role==3)
        echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='".$rs['imgURL']."'>";
    else
        echo "</td><td></td>";
    if($role==4)
        echo "</td><td>" , "<img class='circle responsive-img' width='100' height='100' src='".$rs['imgURL']."'>";
    else
        echo "</td><td></td>";
//echo '<td><a href="03.delete.php?id=', $rs['id'], '">刪</a> </td></tr>';
// $id=$rs['prdID'];
// echo "<td><a href='add2Cart.php?id=$id'>加</a>";
// echo " - <a href='04.editform.php?id=$id'>改</a> </td></tr>";

}
?>
</table>
<a class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
<!-- <a href="showOrder.php">show all orders</a> -->
</body>
</html>
