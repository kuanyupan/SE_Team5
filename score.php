<?php
require_once("dbconfig.php");
global $db;
// $tid = $_GET['tid'];
$sql = "select * from orderform where tid=1";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt);
$total = 0;
while ($rs = mysqli_fetch_assoc($result)) {
    if($rs['inventory'] >= 0) {
        $total += $rs['inventory']; 
    }else {
        $total += ($rs['inventory']) * (-2);
    }
    
}
echo "$total";

// update總成本
$sql1 = "update team set totalscore=$total where tid=1";
$stmt1 = mysqli_prepare($db, $sql1); //prepare sql statement
mysqli_stmt_execute($stmt1);  //執行SQL

// 排名
$sql2 = "select * from team  order by totalscore";
$stmt2 = mysqli_prepare($db, $sql2); //prepare sql statement
mysqli_stmt_execute($stmt2);  //執行SQL
$result2 = mysqli_stmt_get_result($stmt2);
$rank = 1;
while($rs2 = mysqli_fetch_assoc($result2)){
    $tid = $rs2['tid'];   
    $sql3 = "update team set rank=$rank where tid=$tid";
    $stmt3 = mysqli_prepare($db, $sql3); //prepare sql statement
    mysqli_stmt_execute($stmt3); 
    $rank = $rank + 1;
}

// 個人成績


?>