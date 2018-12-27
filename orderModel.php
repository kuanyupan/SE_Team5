<?php
require_once("dbconfig.php");
function ordList() 
{
    global $db;
    $sql = "select * from orderform";
    $stmt = mysqli_prepare($db, $sql);
    //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
function addOrder($cid,$term) {
    global $db;
    $sql = "insert into orderform (cid,term) values (?,?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$cid, $term);
    mysqli_stmt_execute($stmt); //執行SQL
    return;
}
function term($cid) {
    global $db;
    $sql = "select max(term) as currentTerm from orderform where cid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $cid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
function updateinit($cid,$inventory) {
    global $db;
    $currentcost = $inventory;
    $sql = "update orderform set inventory = ? ,currentcost = ?,complete = 1 where cid = ? and term = 0";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $inventory, $currentcost, $cid);
    mysqli_stmt_execute($stmt); 
    return;
}
function updatedata($cid,$quantity,$term) {
    global $db;
    if ($term < 2) {
        $sql = "update orderform set quantity = ? ,complete = 1 where cid = ? and term = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iii", $quantity, $cid, $term);
    } else {
        $arr = mysqli_fetch_assoc(updatearr($cid, $term));
        $sql = "update orderform set quantity = ?, arrival = ?,complete = 1 where cid = ? and term = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iiii", $quantity, $arr["quantity"], $cid, $term);
    }
    
    mysqli_stmt_execute($stmt); 
    return;
}
function updatearr($cid,$term) {
    global $db;
    $sql = "select quantity from orderform where cid = ? and term = ? - 2";
    $stmt = mysqli_prepare($db, $sql); 
    mysqli_stmt_bind_param($stmt, "ii", $cid, $term);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
?>