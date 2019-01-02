<?php
require('dbconfig.php');

$period=range(1,50);
$need=$_POST['need'];
$fifty=array_combine($period,$need);
$sql = "delete from need ;";
	$stmt = mysqli_prepare($db, $sql );
	
	mysqli_stmt_execute($stmt);

foreach($fifty as $item => $value){
if ($need) {
	$sql = "insert into need (period,need) values (?,?)";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ii", $item, $value); //bind parameters with variables
	mysqli_stmt_execute($stmt);  //執行SQL
	
} 
}
header("Location: SetNeed.php");
?>
