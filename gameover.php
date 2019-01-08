<?php
require_once("score.php");
require_once("dbconfig.php");
require_once("teamModel.php");
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

<h3>Game Over</h3>

<h4>排名:
<?php
$uid = $_SESSION['uid'];
$tid = getTid($uid);
$sql = "select rank from team where tid=$tid";
$stmt = mysqli_prepare($db, $sql); //prepare sql statement
mysqli_stmt_execute($stmt);  //執行SQL
$result = mysqli_stmt_get_result($stmt);
$rs = mysqli_fetch_assoc($result);
$rank = $rs['rank'];
echo $rank;
?>
</h4>
<div>
<?php
require_once("showchart.php");
?>
</div>

</body>
</html>