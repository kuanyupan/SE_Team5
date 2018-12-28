<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>insert new room</p>
<hr />
<?php
require('dbconfig.php');
global $db;
$role=$_POST['role'];
$name=$_POST['name'];
$uid = 003;
if ($name && $role) {
    if($role == 1) {
        $sql = "insert into team (tname,f) values (?,?)";
	    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
	    mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
	    mysqli_stmt_execute($stmt);  //執行SQL
        echo "room added.";
        header("refresh:1; url=teamView.php" );
    } else if($role == 2) {
        $sql = "insert into team (tname,d) values (?,?)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //執行SQL
        echo "room added.";
        header("refresh:1; url=teamView.php" );
    } else if($role == 3) {
        $sql = "insert into team (tname,w) values (?,?)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //執行SQL
        echo "room added.";
        header("refresh:1; url=teamView.php" );
    } else {
        $sql = "insert into team (tname,r) values (?,?)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //執行SQL
        echo "room added.";
        header("refresh:1; url=teamView.php" );
    }
	
    
} else {
	echo "empty name or role, please try again.";
    header("refresh:1; url=newteam.php" );
}
?>
</body>
</html>