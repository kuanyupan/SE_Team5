<?php
require("teamModel.php");
//checkLogin();
$result=getTeamList();
$rs = mysqli_fetch_assoc($result);
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

<body>

<h3>Insert role</h3>

<?php
require('dbconfig.php');
$role = $_POST['role'];
$tid = $_GET['tid'];
// $teamname = $_GET['teamname'];
$uid = 001;

if ($role == 1) {
	$sql = "update team set role1 = $uid where tid=$tid";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "role1 added.";
}
else if ($role == 2) {
	$sql = "update team set role2 = $uid where tid=$tid";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "role2 added.";
}
else if ($role == 3) {
	$sql = "update team set role3 = $uid where tid=$tid";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "role3 added.";
}
else if ($role == 4) {
	$sql = "update team set role4 = $uid where tid=$tid";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_execute($stmt);  //執行SQL
	echo "role4 added.";
}
else {
	echo "cannot update!";
}
?>
<!-- <a href="./">回首頁</a> -->
</body>
</html>
