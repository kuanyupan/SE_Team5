<h1>Login Form</h1><hr />
<form method="post" action="loginControl.php">
LoginID: <input type="text" name="uid"><br />
Password : <input type="password" name="password"><br />
<input type="submit">
<input type="button"  value="註冊" onclick="this.form.action='register.html';this.form.submit();">
</form>