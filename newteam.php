<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Game</title>
</head>
<body>
    <h3>NEW TEAM</h3>
    <div class="row">
    <form method="post" class="col s12" action="insertTeam.php">
    <div class="row">
    <p class="input-field col s3">
        <input id="name"name="name" type="text" class="validate">
        <label for="name">Team Name</label>
    </p>
    </div>
    <div>
      <label>
        <input class="with-gap" name="role" type="radio" value="1" checked />
        <span>Factory</span>
      </label>
    </div>
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
  </div>
</body>
</html>