

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="list.css">

</head>

<body>

<h1 style="text-align: center;">Login Form</h1>
<hr />
<form method="post" action="loginControl.php">
<table width="300" border="1">
	<tr>
		<th>LoginID: </th>
		<td><input type="text" name="uid"></td>
	</tr>
	<tr>
		<th>Password : </th>
		<td><input type="password" name="password"></td>
	</tr>

</table>
<div style="text-align: center; padding:6px 6px 6px 12px;">
	<input class="btn waves-effect waves-light red lighten-2 right" type="submit">
	<input class="btn waves-effect waves-light red lighten-2 right" type="button"  value="註冊" onclick="this.form.action='register.html';this.form.submit();">
</div>
</form>

</body>
</html>
