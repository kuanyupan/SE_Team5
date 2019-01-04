<?php
  require_once("orderModel.php");
  $tid = 1;
  $uid = 1;
  $cid = cid($tid,$uid);
  delete($tid,$cid);
  addOrder($tid,$cid,0);
  updateinit($tid,$cid,15);
  addOrder($tid,$cid,1);
  $currentTerm = period($tid,$cid);
  updatedata($tid,$cid,$currentTerm);
  header("Location: orderView.php?tid=$tid&uid=$uid&cid=$cid");
?>