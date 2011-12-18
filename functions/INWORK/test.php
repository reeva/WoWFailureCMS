<?php
require_once("../../../configs.php");
$con = mysql_connect("$serveraddress", "$serveruser", "$serverpass", "$server_adb") or die(mysql_error());
        mysql_select_db("$server_db", $con) or die("Error Cant Connect".mysql_error());
        $query = "SELECT * FROM account WHERE online = '1'";
		$response=mysql_query($query);
// Finishing common variables
// Setting variables to 0
$index = 0;
$resultat = 0;
// End setting variables to 0
// Script
$gma = "SELECT * FROM account_access WHERE gmlevel > '0'";
$gm = mysql_query($gma);
while($gmid = mysql_fetch_array($gm)) {
$id[$index] = $gmid['id'];
$index = $index + 1;
	}
while($raw = mysql_fetch_array($response)) {
   if(($raw[id] == $id[0]) || ($raw[id] == $id[1]) || ($raw[id] == $id[2]) || ($raw[id] == $id[3]) || ($raw[id] == $id[4]) || ($raw[id] == $id[5]) || ($raw[id] == $id[6]) || ($raw[id] == $id[7]) || ($raw[id] == $id[8]) || ($raw[id] == $id[9]) || ($raw[id] == $id[10]) || ($raw[id] == $id[11]) || ($raw[id] == $id[12]) || ($raw[id] == $id[13]) || ($raw[id] == $id[14]) || ($raw[id] == $id[15]) || ($raw[id] == $id[16]) || ($raw[id] == $id[17]) || ($raw[id] == $id[18]) || ($raw[id] == $id[19]) || ($raw[id] == $id[20]) || ($raw[id] == $id[21]) || ($raw[id] == $id[22]) || ($raw[id] == $id[23]) || ($raw[id] == $id[24]) || ($raw[id] == $id[25]) || ($raw[id] == $id[26]) || ($raw[id] == $id[27]) || ($raw[id] == $id[28]) || ($raw[id] == $id[29]) || ($raw[id] == $id[30]) || ($raw[id] == $id[31]) || ($raw[id] == $id[32]) || ($raw[id] == $id[33]) || ($raw[id] == $id[34]) || ($raw[id] == $id[35]) || ($raw[id] == $id[36]) || ($raw[id] == $id[37]) || ($raw[id] == $id[38]) || ($raw[id] == $id[39]) || ($raw[id] == $id[40]) || ($raw[id] == $id[41]) || ($raw[id] == $id[42]) || ($raw[id] == $id[43]) || ($raw[id] == $id[44]) || ($raw[id] == $id[45]) || ($raw[id] == $id[46]) || ($raw[id] == $id[47]) || ($raw[id] == $id[48]) || ($raw[id] == $id[49]) || ($raw[id] == $id[50]) || ($raw[id] == $id[51]) || ($raw[id] == $id[52]) || ($raw[id] == $id[53]))
    {
	$resultat = $resultat + 1;
	}
	else
	{
	echo "";
	}
	}
	echo "GM's Online : $resultat";
// End of the Script
	?>