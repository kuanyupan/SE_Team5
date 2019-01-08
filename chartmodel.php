<?php
require_once("dbconfig.php");
function factory($tid) {
    global $db;
    $sql = "select period, inventory, currentcost from orderform where tid = ? and cid = 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function distributor($tid) {
    global $db;
    $sql = "select period, inventory, currentcost from orderform where tid = ? and cid = 2";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function wholesaler($tid) {
    global $db;
    $sql = "select period, inventory, currentcost from orderform where tid = ? and cid = 3";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function retailer($tid) {
    global $db;
    $sql = "select period, inventory, currentcost from orderform where tid = ? and cid = 4";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}


?>