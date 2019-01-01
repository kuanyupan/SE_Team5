<?php
require_once("orderModel.php");
$tid = 1;
$cid = 1;
$quantity = (int)$_POST['num'];
$currentTerm = period($tid,$cid);
update($tid,$cid,$quantity,$currentTerm);
addOrder($tid,$cid,$currentTerm+1);
updatedata($tid,$cid,$currentTerm+1);
header("Location: orderView.php");
?>