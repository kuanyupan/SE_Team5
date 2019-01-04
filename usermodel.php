<?php
require_once("dbconfig.php");
function login($id, $pwd) 
{
    global $db;
    $_SESSION['uid'] = 0;
	$_SESSION['role'] = '';
    if ($id> " ") {
        $sql = "select * from user where loginID=? and pwd=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
        if($r) {
            $_SESSION['uid'] = $r['uid'];
			$_SESSION['role'] = $r['role'];
            if($r['role'] == 1){
			    return 2;
            }else{
                return 1;
            }
        } else {
            return 0;
        } 
    } 
    return 0;
}

function getRole() 
{
    return $_SESSION['role'];
}

function getCurrentUser() 
{
    return $_SESSION['uid'];
}
?>