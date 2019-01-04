<?php
require_once("dbconfig.php");
function ordList($tid, $cid) {
    global $db;
    $sql = "select * from orderform where tid = ? and cid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $tid, $cid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
function addOrder($tid,$cid,$period) {
    global $db;
    $sql = "insert into orderform (tid,cid,period) values (?,?,?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $tid, $cid, $period);
    mysqli_stmt_execute($stmt); //執行SQL
    return;
}
function period($tid,$cid) {
    global $db;
    $sql = "select max(period) as currentperiod from orderform where tid = ? and cid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $tid, $cid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $period = $result['currentperiod'];
    return $period;
}
function updateinit($tid,$cid,$inventory) { // 修改初期
    global $db;
    $currentcost = $inventory;
    $sql = "update orderform set inventory = ? ,currentcost = ?,complete = 1 
    where tid = ? and cid = ? and period = 0";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $inventory, $currentcost, $tid, $cid);
    mysqli_stmt_execute($stmt); 
    return;
}
function update($tid,$cid,$quantity,$period) { // 修改訂購量
    global $db;
    $sql = "update orderform set quantity = ?,complete = 1 
    where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $quantity, $tid, $cid, $period);
    mysqli_stmt_execute($stmt); 
    return;
}
function updatedata($tid,$cid,$period) { // 修改其他數值
    global $db;
    updatearr($tid,$cid,$period);
    updatedemand($tid,$cid,$period);
    updateinventory($tid,$cid,$period);
    updatesales($tid,$cid,$period);
    updatecost($tid,$cid,$period);
    return;
}
function updatearr($tid,$cid,$period) { // 修改到貨量
    global $db;
    if ($cid == 1) {
        $sql = "select quantity as arr from orderform 
        where tid = ? and cid = ? and period = ?";
        $p = $period - 2;
        $stmt = mysqli_prepare($db, $sql); 
        mysqli_stmt_bind_param($stmt, "iii", $tid, $cid, $p);
    } else { 
        $sql = "select sales as arr from orderform 
        where tid = ? and cid = ? and period = ?";
        $p = $period - 2;
        $c = $cid - 1;
        $stmt = mysqli_prepare($db, $sql); 
        mysqli_stmt_bind_param($stmt, "iii", $tid, $c, $p);
    }
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $arr = mysqli_fetch_assoc($result);
    if ($period >= 2) {
        $sql = "update orderform set arrival = ? 
        where tid = ? and cid = ? and period = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iiii", $arr['arr'],
        $tid, $cid, $period);
    } else {
        $sql = "update orderform set arrival = 0 
        where tid = ? and cid = ? and period = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iii",
        $tid, $cid, $period);
    }
    mysqli_stmt_execute($stmt); 
    return;
}
function updatedemand($tid,$cid,$period) { // 修改需求
    global $db;
    if ($cid == 4) {
        $sql = "select need as demand from need where period = ?";
        $stmt = mysqli_prepare($db, $sql); 
        mysqli_stmt_bind_param($stmt, "i", $period);
    } else {
        $sql = "select quantity as demand from orderform 
        where tid = ? and cid = ? and period = ?";
        $c = $cid + 1;
        $stmt = mysqli_prepare($db, $sql); 
        mysqli_stmt_bind_param($stmt, "iii", $tid, $c, $period);
    }
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $demand = mysqli_fetch_assoc($result);
    $sql = "update orderform set demand = ? 
    where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $demand['demand'],
    $tid, $cid, $period);
    mysqli_stmt_execute($stmt); 
    return;
}
function updateinventory($tid,$cid,$period) { // 修改庫存<0表欠貨，新庫存=舊庫存+到貨-訂單-欠貨
    global $db;
    $sql = "select inventory from orderform where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    $p = $period - 1;
    mysqli_stmt_bind_param($stmt, "iii", $tid, $cid,$p);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $lastinv = mysqli_fetch_assoc($result);
    $sql = "select arrival, demand from orderform where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $tid, $cid,$period);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $tmp = mysqli_fetch_assoc($result);
    $currentinv = $lastinv['inventory'] - $tmp['demand'] + $tmp['arrival'];
    $sql = "update orderform set inventory = ? 
    where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $currentinv,
    $tid, $cid, $period);
    mysqli_stmt_execute($stmt); 
    return;
}
function updatesales($tid,$cid,$period) { // 修改銷貨量
    global $db; 
    $sql = "select inventory, demand, arrival from orderform 
    where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $tid, $cid, $period);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $current = mysqli_fetch_assoc($result);

    $sql2 = "select inventory from orderform where tid = ? and cid = ? and period = ?";
    $p = $period - 1;
    $stmt2 = mysqli_prepare($db, $sql2);
    mysqli_stmt_bind_param($stmt2, "iii", $tid, $cid, $p);
    mysqli_stmt_execute($stmt2); //執行SQL
    $rs = mysqli_stmt_get_result($stmt2);
    $last = mysqli_fetch_assoc($rs);
    $sales = 0;
    if ($last['inventory'] < 0) { 
        if ($current['inventory'] < 0) {
            $sales = $current['arrival'];
        } else {
            $sales = $current['arrival'] - $current['inventory'];
        }
    } else {
        if ($current['inventory'] < 0) {
            $sales = $last['inventory'] + $current['arrival'];
        } else {
            $sales = $current['demand'];
        }
    }
    $sql = "update orderform set sales = ? 
    where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $sales,
    $tid, $cid, $period);
    mysqli_stmt_execute($stmt);
    return;
}
function updatecost($tid,$cid,$period) { // 修改當其成本
    global $db;
    $sql = "select inventory from orderform where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $tid, $cid, $period);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $inventory = mysqli_fetch_assoc($result);
    if ($inventory['inventory'] < 0) { // 欠貨
        $sql = "select (inventory*(-2)) as cost from orderform 
        where tid = ? and cid = ? and period = ?";
    } else {
        $sql = "select (inventory*1) as cost from orderform 
        where tid = ? and cid = ? and period = ?";
    }
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $tid, $cid, $period);
    mysqli_stmt_execute($stmt); //執行SQL
    $rs = mysqli_stmt_get_result($stmt); 
    $cost = mysqli_fetch_assoc($rs);
    $sql = "update orderform set currentcost = ? 
    where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $cost['cost'],
    $tid, $cid, $period);
    mysqli_stmt_execute($stmt); 
    return;
}
function character($cid) {
    global $db;
    $sql = "select * from characters where cid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $cid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['cname'];
}
function user($uid) {
    global $db;
    $sql = "select * from user where uid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['uname'];
}
function check($tid,$cid,$period) {
    global $db;
    $sql = "select complete from orderform where tid = ? and cid = ? and period = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $tid, $cid, $period);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $rs = mysqli_fetch_assoc($result);
    return $rs['complete'];
}
function cid($tid,$uid) {
    global $db;
    $sql = "select * from team where tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    if ($rs['f'] == $uid)
        $cid = 1;
    else if ($rs['d'] == $uid)
        $cid = 2;
    else if ($rs['w'] == $uid)
        $cid = 3;
    else
        $cid = 4;
    return $cid;
}
function delete($tid,$cid) {
    global $db;
    $sql = "DELETE FROM `orderform` WHERE tid = ? and cid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $tid, $cid);
    mysqli_stmt_execute($stmt); //執行SQL
    return;
}
?>