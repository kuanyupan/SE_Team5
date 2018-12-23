<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Game</title>
</head>
<body>
    <p>NEW ROOM</p>
    <table width="400" border="1">
  <tr>
    <td>team name</td>
    <td>RoleA</td>
    <td>RoleB</td>
    <td>RoleC</td>
    <td>RoleD</td>
  </tr>
  <tr><form method="post" action="addroom.php">
    <td><label>
      <input name="name" type="text" id="name" />
    </label></td>
    <td><label>
        <input name="role" type="radio" id="role" value="1"/>
    </label></td>
    <td><label>
        <input name="role" type="radio" id="role" value="2"/>
    </label></td>
    <td><label>
        <input name="role" type="radio" id="role" value="3"/>
    </label></td>
    <td><label>
        <input name="role" type="radio" id="role" value="4"/>
    </label></td>
    <td>
        <input type="submit" name="Submit" value="送出" />
    </td>
	</form>
  </tr>
</table>
</body>
</html>