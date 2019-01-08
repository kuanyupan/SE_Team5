<?php
require("orderModel.php");
require("userModel.php");
require("teamModel.php");
require_once("dbconfig.php");
global $db;
$uid = $_SESSION['uid'];
$tid = getTid($uid);
$cid = cid($tid,$uid);

$result = ordList($tid,$cid);
$cumulativecost = 0;

$sql1 = "select uname,tname from user u,team t where t.tid = u.tid and t.tid= ? and uid = ?";
    $stmt1 = mysqli_prepare($db, $sql1);
    mysqli_stmt_bind_param($stmt1, "ii", $tid, $uid);
    mysqli_stmt_execute($stmt1); //執行SQL
    $result1 = mysqli_stmt_get_result($stmt1);
    

$sql2 = "select cname from characters where cid = ?";
    $stmt2 = mysqli_prepare($db, $sql2);
    mysqli_stmt_bind_param($stmt2, "i", $cid);
    mysqli_stmt_execute($stmt2); //執行SQL
    $result2 = mysqli_stmt_get_result($stmt2);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="list.css">

</head>

<body>

<h1 style="text-align: center;">~~~個人記錄~~~</h1>
<hr />

<table width="300" border="1">
  <tr>
    <th>名字</th>
    <th>隊伍</th>
    <th>職業</th>
    <th>總成本</th>
  </tr>
<?php
while ($rs = mysqli_fetch_assoc($result)) {
        if($rs['period'] > 0) {
            $cumulativecost += $rs['currentcost'];
        }
        //$tmpcid = $rs['cid'];
}
while ($rs2 = mysqli_fetch_assoc($result2)){
    $cname = $rs2['cname'];
}
while($rs1 = mysqli_fetch_assoc($result1)){
	echo "<tr><td>" , $rs1['uname'] ,
    "</td><td>" , $rs1['tname'] ,
    "</td><td>" , $cname ,
    "</td><td>" , $cumulativecost ,
    "</td></tr>";
}
?>
</table>
</body>
</html>
