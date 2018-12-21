<?php
require_once("dbconfig.php");
function getTeamList() 
{
    global $db;
        $sql = "select team.name, user.imgURL, game.role from team, user, game where team.tid = game.tid and user.uid = game.uid ";
        $stmt = mysqli_prepare($db, $sql);
        //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        return $result;
}

?>
