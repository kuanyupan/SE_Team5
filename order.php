<?php
require_once("orderModel.php");
$cid = $_REQUEST['cid'];
$tid = $_REQUEST['tid'];
$uid = $_REQUEST['uid'];
$quantity = (int)$_POST['num'];
$currentTerm = period($tid,$cid);
update($tid,$cid,$quantity,$currentTerm);
addOrder($tid,$cid,$currentTerm+1);
updatedata($tid,$cid,$currentTerm+1);
header("Location: orderView.php?tid=$tid&uid=$uid&cid=$cid");
?>