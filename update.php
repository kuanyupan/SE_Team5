<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>update message</p>
<hr />
<?php
require("dbconfig.php");

$uid = $_SESSION['uid'];
$loginID=$_POST['loginID'];
$name=$_POST['name'];
$pwd=$_POST['pwd'];

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

if ($uid>0) {
    $sql = "update user set name=?, loginID=?, password=? ,imgURL=?,imgType=? where uid=?";
    $stmt = mysqli_prepare($db,$sql);
    mysqli_stmt_bind_param($stmt,"sssssi",$name,$loginID,$pwd,$fileContents,$imgType,$uid);
    mysqli_stmt_execute($stmt); //執行SQL
	echo "message updated"; 
} else echo "empty message id.";
header("Location: teamView.php");
?>
</body>
</html>
