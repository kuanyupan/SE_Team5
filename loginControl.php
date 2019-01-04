<?php
require("usermodel.php");
$uid = $_POST['uid'];
$passWord = $_POST['password'];
if (login($uid, $passWord)==1) {
    header("Location: teamView.php");//連到玩家介面
}else if(login($uid, $passWord)==2){
    header("Location: adminTeamView.php"); //連到管理員介面
} else {
    header("Location: register.html");
}
?>