<?php
require("dbconfig.php");

$name = $_POST['name'];
$ID = $_POST['loginID'];
$password = $_POST['password'];
//$img = $_POST['imgURL'];
echo $name;
echo $ID;
echo $password;
if($ID!='' ||$password!=''){
    $sql = "INSERT INTO user (name,loginID,password) VALUES(?,?,?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sss",$name, $ID,$password);
    mysqli_stmt_execute($stmt); //執行SQL
    header("Location: loginView.php");
}
else{
    header("Location: register.html");
}

?>