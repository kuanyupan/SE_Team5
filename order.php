<?php
require_once("orderModel.php");

$cid = 1;
$quantity = (int)$_POST['num'];
$term = mysqli_fetch_assoc(term($cid));
$currentTerm = $term['currentTerm'];
updatedata($cid,$quantity,$currentTerm);
addOrder($cid,$currentTerm+1);
header("Location: orderView.php");
?>