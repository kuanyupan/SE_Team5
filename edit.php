<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>

</head>
<body>
<?php
    require_once("dbconfig.php");
    require("editmodel.php");
    require("usermodel.php");
    $uid=$_SESSION['uid'];
    if ($uid <=0) {
	echo "empty ID";
	exit(0);
}
    $sql = "select * from user where uid=?;";
        $stmt = mysqli_prepare($db, $sql );
        mysqli_stmt_bind_param($stmt, "i", $uid);
        mysqli_stmt_execute($stmt); //執行 sql
        $result = mysqli_stmt_get_result($stmt); 
        if ($rs=mysqli_fetch_array($result)) {
?>
<table width="200" border="1" class="">
<form method="post" action="update.php">  
  <tr>
    <td>name</td>
    <td>loginID</td>
    <td>password</td>
  </tr>
  <tr>
    <td>
    <input type="hidden" name="uid" value="<?php echo $rs['uid']; ?>" />
    <input type="text" name="name" value="<?php echo $rs['name']; ?>" placeholder="輸入姓名">
    </td>
    <td>
    <input type="text" name="loginID" value="<?php echo $rs['loginID']; ?>"panel placeholder="輸入帳號">
    </td>
    <td>
    <input type="text" name="pwd" value="<?php echo $rs['password']; ?>"panel placeholder="輸入密碼">
    </td>
    <!--
    <input type="file" name="imgURL" value=""panel placeholder="上傳大頭貼">
    -->
</table>
    <input type="submit" name="Submit" value="送出" />
    <input type="button"  value="取消" onclick="this.form.action='teamView.php';this.form.submit();"> 
    </form>
<?php
} else echo "cannot find the message to edit.";
?>
  </body>
</html>