<?php
require_once("dbconfig.php");
require_once("teamModel.php");
require_once("usermodel.php");
global $db;
$uid = $_SESSION['uid'];
$getTid = getTid($uid);
$sql = "select * from orderform where tid=$getTid";
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
// echo "$total";

// update總成本
$sql1 = "update team set totalscore=$total where tid=$getTid";
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
$sql4 = "select count(*) from team where full=1";
$stmt4 = mysqli_prepare($db, $sql4); //prepare sql statement
mysqli_stmt_execute($stmt4);  //執行SQL
$result4 = mysqli_stmt_get_result($stmt4);// 組數
$score=mysqli_fetch_array($result4);
// echo $score[0];
// 
$sql7 = "select * from team  order by rank";
$stmt7 = mysqli_prepare($db, $sql7); //prepare sql statement
mysqli_stmt_execute($stmt7);  //執行SQL
$result7 = mysqli_stmt_get_result($stmt7);
while($rs7 = mysqli_fetch_assoc($result7)) {
    $tid = $rs7['tid'];
    // uid
    $sql6 = "select * from team where tid=?";
    
    $stmt6 = mysqli_prepare($db, $sql6); //prepare sql statement
    mysqli_stmt_bind_param($stmt6, "i",$tid);
    mysqli_stmt_execute($stmt6);  //執行SQL
    
    $result6 = mysqli_stmt_get_result($stmt6);
    $rs6 = mysqli_fetch_assoc($result6);

    $uid = array($rs6['f'],$rs6['d'],$rs6['w'],$rs6['r']);

    // $uid[0] = $rs6['f'];
    // $uid[1] = $rs6['d'];
    // $uid[2] = $rs6['w'];
    // $uid[3] = $rs6['r'];
    // echo "hi";
    // echo $rs6['f'];
    // echo $rs6['d'];
    // echo $rs6['w'];
    // echo $rs6['r'];
    for($i=0; $i<=3; $i++){
        $getScore = getScore($uid[$i]);
        // echo $uid[$i];
        // echo $getScore;
        $sql5 = "update user set score=$getScore+? where uid= ?";
        $stmt5 = mysqli_prepare($db, $sql5); //prepare sql statement
        mysqli_stmt_bind_param($stmt5, "ii",$score[0], $uid[$i]);
        mysqli_stmt_execute($stmt5); 
    }
    $score[0]--;
    
}

// $sql5 = "update user set score=$score ";
// $stmt5 = mysqli_prepare($db, $sql5); //prepare sql statement
// mysqli_stmt_execute($stmt5);  //執行SQL
// $result5 = mysqli_stmt_get_result($stmt5);
?>