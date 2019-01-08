<?php
require_once("orderModel.php");
$cid = $_REQUEST['cid'];
$tid = $_REQUEST['tid'];
$uid = $_SESSION['uid'];
$quantity = (int)$_POST['num'];
$currentTerm = period($tid,$cid);
update($tid,$cid,$quantity,$currentTerm);
if ($currentTerm == 50) {
  header("Location: waittoend.php?tid=$tid&cid=$cid");
} else {
  addOrder($tid,$cid,$currentTerm+1);
  updatedata($tid,$cid,$currentTerm+1);
  header("Location: orderView.php?tid=$tid&cid=$cid");
}
?>