<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>insert new room</p>
<hr />
<?php
require('dbconfig.php');
global $db;
$role=$_POST['role'];
$name=$_POST['name'];
if ($name) {
	$sql1 = "insert into team (name) values (?)";
	$stmt1 = mysqli_prepare($db, $sql1); //prepare sql statement
	mysqli_stmt_bind_param($stmt1, "s",$name); //bind parameters with variables
	mysqli_stmt_execute($stmt1);  //執行SQL
	echo "room added.";
    //header("refresh:3; url=teamView.php" );
} else {
	echo "empty title, cannot insert.";
    //header("refresh:3; url=teamView.php" );
}
if ($role) {
    $sql2 = "select team.tid from team where team.name = '$name'";
    $stmt2 = mysqli_prepare($db, $sql2);
    mysqli_stmt_execute($stmt2); //執行SQL
    $result = mysqli_stmt_get_result($stmt2);
    $rs = mysqli_fetch_assoc($result);
    $id = $rs['tid'];
    $sql3 = "insert into game (tid,role) values (?,?)";
	$stmt3 = mysqli_prepare($db, $sql3); //prepare sql statement
	mysqli_stmt_bind_param($stmt3, "ii",$id,$role); //bind parameters with variables
	mysqli_stmt_execute($stmt3);
    
}
?>
</body>
</html>