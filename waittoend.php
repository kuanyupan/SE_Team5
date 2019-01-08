<?php
require_once("orderModel.php");
$cid = $_REQUEST['cid'];
$tid = $_REQUEST['tid'];
$uid = $_SESSION['uid'];
$currentTerm = period($tid,$cid);
updatedata($tid,$cid,$currentTerm);
if (checkcomplete($tid,$currentTerm) == 4) 
  header("Location: gameover.php");
else 
  header("refresh: 1;url=waittoend.php?tid=$tid&cid=$cid");
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

<h3>wait for other teammate complete</h3>

</div>

</body>
</html>