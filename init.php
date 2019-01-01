<?php
  require_once("orderModel.php");
  $tid = 1;
  $cid = 1;
  addOrder($tid,$cid,0);
  updateinit($tid,$cid,15);
  addOrder($tid,$cid,1);
  $currentTerm = period($tid,$cid);
  updatedata($tid,$cid,$currentTerm);
  header("Location: orderView.php");
?>