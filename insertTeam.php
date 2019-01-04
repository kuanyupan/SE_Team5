<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>�L���D���</title>
</head>

<body>

<p>insert new room</p>
<hr />
<?php
require('dbconfig.php');
require('teamModel.php');
$result=getTeamList();
$rs = mysqli_fetch_assoc($result);
global $db;
$role=$_POST['role'];
$name=$_POST['name'];
// $tid=$rs['tid'];
// $tname=$rs['tname'];

if ($name && $role) {
    if($role == 1) {
        $sql = "insert into team (tname,f) values (?,?)";
	    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
	    mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
	    mysqli_stmt_execute($stmt);  //����SQL
        echo "room added.";
        $sql1 = "select * from team where tname='".$name."'";
        $stmt1 = mysqli_prepare($db, $sql1);
        mysqli_stmt_execute($stmt1); //執行SQL
        $result = mysqli_stmt_get_result($stmt1);
        $rs1 = mysqli_fetch_assoc($result);
        $tid = $rs1['tid'];
        header("refresh:1; url=waitingView.php?tid=$tid&tname=$name" );
    } else if($role == 2) {
        $sql = "insert into team (tname,d) values (?,?)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //����SQL
        echo "room added.";
        // header("refresh:1; url=waitingView.php?tid=$tid&tname=$tname" );
    } else if($role == 3) {
        $sql = "insert into team (tname,w) values (?,?)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //����SQL
        echo "room added.";
        // header("refresh:1; url=waitingView.php?tid=$tid&tname=$tname" );
    } else {
        $sql = "insert into team (tname,r) values (?,?)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "si",$name,$uid); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //����SQL
        echo "room added.";
        // header("refresh:1; url=waitingView.php?tid=$tid&tname=$tname" );
    }
	
    
} else {
	echo "empty name or role, please try again.";
    header("refresh:1; url=newteam.php" );
}
?>
</body>
</html>