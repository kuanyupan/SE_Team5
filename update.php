<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>update message</p>
<hr />
<?php
require("dbconfig.php");

$uid = $_SESSION['uid'];
$loginID=$_POST['loginID'];
$name=$_POST['name'];
$pwd=$_POST['pwd'];
if ($uid>0) {
    $sql = "update user set name=?, loginID=?, password=? where uid=?";
    $stmt = mysqli_prepare($db,$sql);
    mysqli_stmt_bind_param($stmt,"sssi",$name,$loginID,$pwd,$uid);
    mysqli_stmt_execute($stmt); //執行SQL
	echo "message updated"; 
} else echo "empty message id.";
header("Location: teamView.php");
?>
</body>
</html>
