<?php
require_once("dbconfig.php");
global $db;
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
$sql1 = "update team set totalscore=$total where tid=1";
$stmt1 = mysqli_prepare($db, $sql1); //prepare sql statement
mysqli_stmt_execute($stmt1);  //執行SQL

$sql2 = "select totalscore from team  order by totalscore";
$stmt2 = mysqli_prepare($db, $sql2); //prepare sql statement
mysqli_stmt_execute($stmt2);  //執行SQL

$sql3 = "update team set rank=$rank";
?>