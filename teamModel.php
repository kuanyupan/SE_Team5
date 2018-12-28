<?php
require_once("dbconfig.php");
function getTeamList() 
{
    global $db;
        $sql = "select * from team";

        $stmt = mysqli_prepare($db, $sql);
        //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt);
        return $result;
}

function getRole1Img(int $tid) 
{
    global $db;
    $result = getTeamList();
    while($rs = mysqli_fetch_assoc($result)) {
        if($rs['tid'] == $tid) {
            $r1 = $rs['f'];
            $sql =  "select user.imgURL from user where $r1 = user.uid";

            $stmt = mysqli_prepare($db, $sql);
            //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt);
            $rs = mysqli_fetch_assoc($result);
            return $rs['imgURL'];
        }
    }
    
}

function getRole2Img(int $tid) 
{
    global $db;
    $result = getTeamList();
    while($rs = mysqli_fetch_assoc($result)) {
        if($rs['tid'] == $tid) {
            $r2 = $rs['d'];
            $sql =  "select user.imgURL from user where $r2 = user.uid";

            $stmt = mysqli_prepare($db, $sql);
            //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt);
            $rs = mysqli_fetch_assoc($result);
            return $rs['imgURL'];
        }
    }
}
function getRole3Img(int $tid) 
{
    global $db;
    $result = getTeamList();
    while($rs = mysqli_fetch_assoc($result)) {
        if($rs['tid'] == $tid) {
            $r3 = $rs['w'];
            
            $sql =  "select user.imgURL from user where $r3 = user.uid";

            $stmt = mysqli_prepare($db, $sql);
            //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt);
            $rs = mysqli_fetch_assoc($result);
            return $rs['imgURL'];
        }
    }
}
function getRole4Img(int $tid) 
{
    global $db;
    $result = getTeamList();
    while($rs = mysqli_fetch_assoc($result)) {
        if($rs['tid'] == $tid) {
            $r4 = $rs['r'];
            $sql =  "select user.imgURL from user where $r4 = user.uid";

            $stmt = mysqli_prepare($db, $sql);
            //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt);
            $rs = mysqli_fetch_assoc($result);
            return $rs['imgURL'];
        }
    }
}

?>
