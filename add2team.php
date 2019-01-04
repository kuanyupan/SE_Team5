<?php
require("teamModel.php");
//checkLogin();
$result = getTeamList();
$tid = $_GET['tid'];
while($rs = mysqli_fetch_assoc($result)) {
    if($rs['tid'] == $tid && $rs['f'] != 0 && $rs['d'] != 0 && $rs['w'] != 0 && $rs['r'] != 0) {
        echo '<script language="JavaScript">;alert("team is full!");location.href="teamView.php";</script>;';
    }
}
?>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Team</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<h3>
    <?php
        $teamname = $_GET['teamname'];
        // add2team($tid, getCurrentUser());
        // $teamname=$rs['name'];
        // echo "$teamname";
        echo "$teamname";
        $tid = $_GET['tid'];
    ?>
</h3>
<form method="post" action="insertRole.php?tid=<?php echo "$tid"?>&teamname=<?php echo "$teamname"?>">
    <p>
      <label>
        <input class="with-gap" name="role" type="radio" value="1" checked />
        <span>Factory</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" name="role" type="radio" value="2" />
        <span>Distributor</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" name="role" type="radio" value="3" />
        <span>Wholesalera</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" name="role" type="radio" value="4" />
        <span>Retailer</span>
      </label>
    </p>
    <input type="submit" name="submit" value="OK" />
  </form>
    
</body>
