<?php
require("dbconfig.php");

$name = $_POST['name'];
$ID = $_POST['loginID'];
$password = $_POST['password'];
//開啟圖片檔
$file = fopen($_FILES["imgURL"]["tmp_name"], "rb");
// 讀入圖片檔資料
$fileContents = fread($file, filesize($_FILES["imgURL"]["tmp_name"])); 
 //關閉圖片檔
fclose($file);
 //讀取出來的圖片資料必須使用base64_encode()函數加以編碼：圖片檔案資料編碼
$fileContents = base64_encode($fileContents);
//$_FILES["imgType"]["type"]的紀錄是為了讓讀圖的時候能有正確的解碼方式
$imgType=$_FILES["imgURL"]["type"];

if($ID!='' ||$password!=''){
    $sql = "INSERT INTO user (uname,loginID,pwd,imgURL,imgType)
        VALUES(?,?,?,?,?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sssss",
        $name, $ID,$password,$fileContents,$imgType);
    mysqli_stmt_execute($stmt); //執行SQL
    header("Location: loginView.php");
    
}else{
    header("Location: register.html");
}

?>