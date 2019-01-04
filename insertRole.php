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
<title>無標題文件</title>
</head>

<body>

<h3>Insert role</h3>

<?php
require_once('dbconfig.php');
$role = $_POST['role'];
$tid = $_GET['tid'];
$tname = $_GET['teamname'];
// $teamname = $_GET['teamname'];
$uid = $_SESSION['uid'];
while($rs = mysqli_fetch_assoc($result)) {
	
	if ($role == 1 && $rs['f'] == 0 && $rs['tid'] == $tid) {
		$sql = "update team set f = $uid where tid=$tid";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_execute($stmt);  //執行SQL
		echo "Factory added.";
		header("refresh:1 ; url=waitingView.php?tid=$tid&tname=$tname");
	} else if ($role == 1 && $rs['f'] != 0 && $rs['tid'] == $tid){
		echo "Factory isn't empty, please choose again.";
		header("refresh:1 ; url=teamView.php");
	} else if ($role == 2 && $rs['d'] == 0 && $rs['tid'] == $tid) {
		$sql = "update team set d = $uid where tid=$tid";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_execute($stmt);  //執行SQL
		echo "Distributor added.";
		header("refresh:1 ; url=waitingView.php?tid=$tid&tname=$tname");
	} else if ($role == 2 && $rs['d'] != 0 && $rs['tid'] == $tid) {
		echo "Distributor isn't empty, please choose again.";
		header("refresh:1 ; url=teamView.php");
	} else if ($role == 3 && $rs['w'] == 0 && $rs['tid'] == $tid) {
		$sql = "update team set w = $uid where tid=$tid";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_execute($stmt);  //執行SQL
		echo "Wholesaler added.";
		header("refresh:1 ; url=waitingView.php?tid=$tid&tname=$tname");
	} else if ($role == 3 && $rs['w'] != 0 && $rs['tid'] == $tid) {
		echo "Wholesaler isn't empty, please choose again.";
		header("refresh:1 ; url=teamView.php");
	} else if ($role == 4 && $rs['r'] == 0 && $rs['tid'] == $tid) {
		$sql = "update team set r = $uid where tid=$tid";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_execute($stmt);  //執行SQL
		echo "Retailer added.";
		header("refresh:1 ; url=waitingView.php?tid=$tid&tname=$tname");
	} else if ($role == 4 && $rs['r'] != 0 && $rs['tid'] == $tid) {
		echo "Retailer isn't empty, please choose again.";
		header("refresh:1 ; url=teamView.phps");
	}
}
	

?>
<!-- <a href="./">回首頁</a> -->
</body>
</html>
