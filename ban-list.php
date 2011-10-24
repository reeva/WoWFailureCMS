<?php

require_once("configs.php");


$con = mysql_connect("$serveraddress", "$serveruser", "$serverpass", "$server_adb") or die(mysql_error());
        mysql_select_db("$server_adb", $con) or die("Error de Conexiom".mysql_error());
        $query = "SELECT * FROM account_banned WHERE active != '0'";

		$respuesta=mysql_query($query);


echo "<table width=\"500px\" border=\"1\"><tr><td>Id</td><td>Banned By:</td><td>Unban Date:</td><td>Duration:</td><td>Reason</td></tr>";

while($aux = mysql_fetch_array($respuesta)) {
    if($aux['active'] == "1") {
        $bantime = "Permanent";
		$unban= "Never";
		
    }
    else {
        $bantime =  date("Y-m-d H:i:s", $aux['bandate']);
		$unban = date("Y-m-d H:i:s", $aux['bandate']);
    }
    
    echo "<tr><td>" . $aux['id'] . "</td><td>" . $aux['bannedby'] . "</td><td>" . $unban . "</td><td>" . $bantime . "</td><td>" . $aux['banreason'] . "</td></tr>";
}

echo "</table>";
?>