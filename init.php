<?php
  require_once("orderModel.php");
  $cid = 1;
  addOrder($cid,0);
  updateinit($cid,15);
  addOrder($cid,1);
  header("Location: orderView.php");
?>