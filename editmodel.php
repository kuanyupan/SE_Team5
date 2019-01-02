<?php
require_once("dbconfig.php");
function showedit($uid) 
{
    global $db;
    if ($uid> 0) {
        $sql = "select * from user where uid=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $uid);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt);
        $rs=mysqli_fetch_array($result);
        return $rs;
    } 
    return NULL;
}
?>