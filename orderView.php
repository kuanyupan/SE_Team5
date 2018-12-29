<?php
    require_once("orderModel.php");
    global $db;
    $cid = 1;
    $period = term($cid);
    $character = "factory";// 先假設為工廠
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Beer Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="orderViewStyle.css">
    <script src="main.js"></script>
</head>
<body>
    <div id="menu">
        <div>
            <h2>Beer Game</h2>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item" font-size="12pt" color="darkcyan">Menu</a>
            <a href="#" class="list-group-item list-group-item-action">回主選單</a>
            <a href="#" class="list-group-item list-group-item-action">離開遊戲</a>
        </div>
    </div>
    <div id="name">
        玩家: role <!-- <?php echo $role ?> -->
        角色: <?php echo $character ?>
    </div>
    <hr/>
    <h6>請輸入第<?php echo $period; ?>期訂購量</h6>
    <div class="container" id="text">
        <div class="row">
            <div class="col col-lg-2" id="period">
                訂單處理周期: 1期<br />
                送貨週期: 2期<br />
                總期數: 50期<br />
            </div>
            <div class="col-sm" id="order">
                第<?php echo $period; ?>/50期:<br />
                <form method="post" action="order.php">
                    訂購量:
                    <input type="text" name="num"><br />
                    <input type="submit" value="下單">
                </form>
            </div>
            <div class="col-sm" id="figure">
                <?php
                    $result = ordList($cid);
                    $sumcost = 0;
                    while ($rs1 = mysqli_fetch_assoc($result)) {
                        $sumcost += $rs1['currentcost'];
                    }
                    if($sumcost < 0) {
                        echo "<img src='angry.png'\ height=\"250\">";
                    }else{
                        echo "<img src='smile.png'\ height=\"250\">";
                    }
                    ?>
                <div id="box"></div>
            </div>
        </div>
    </div>
    <div id="table">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">期數</th>
                <th scope="col">訂購量</th>
                <?php
                if($character == "factory") {
                    echo "<th scope='\col'\>生產量</th>";
                }else{
                    echo "<th scope='\col'\>到貨量</th>";
                }
                ?>
                <th scope="col">庫存</th>
                <th scope="col">需求</th>
                <th scope="col">當期成本</th>
                <th scope="col">累計成本</th>
                <th scope="col">銷售量</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = ordList($cid);
                    $cumulativecost = 0;
                    while ($rs = mysqli_fetch_assoc($result)) {
                        $cumulativecost += $rs['currentcost'];
                        echo "<tr><th scope='\row'\>" , $rs['period'] ,
                        "</th><td>" , $rs['quantity'],
                        "</td><td>" , $rs['arrival'],
                        "</td><td>" , $rs['inventory'],
                        "</td><td>" , $rs['demand'],
                        "</td><td>" , $rs['currentcost'],
                        "</td><td>" , $cumulativecost,
                        "</td><td>" , $rs['sales'],"</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>