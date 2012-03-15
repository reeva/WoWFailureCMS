<?php
if(!isset($_SESSION)) session_start();

# Languages ############

if(isset($_GET['Local'])) $lang = $_GET['Local'];
else if(isset($_SESSION['Local'])) $lang = $_SESSION['Local'];
if(empty($lang)) $lang = 'en-us';


$language = $lang;
$langs = Array("en-us" => null, "ro-ro" => null, "en-gb" => null, "it-it" => null, "de-de" => null, "es-es" => null, "bu-bg" => null , "es-mx" => null, "gr-gr" => null, "ru-ru" => null, "zh-cn" => null, "zh-tw" => null, "fr-fr" => null);
if(array_key_exists($lang,$langs))require_once("lang/".$lang.".php");
else require_once("/lang/en-us.php");
$_SESSION['Local'] = $language;
######################


# Mysql ################

$serveraddress = "127.0.0.1";
$serveruser = "root";
$serverpass = "password";
$serverport	= "3306";

$server_db = "website";
$server_adb = "auth";

$server_cdb = "characters";
$server_wdb = "world";

$server_cdb_2 = "characters";
$server_wdb_2 = "world";

$server_cdb_3 = "characters";
$server_wdb_3 = "pworld";

######################


# Extra ################

$website['realm'] = "Set Realmlist Your_Realmlist";
$charTable = 'characters';
$name_realm1['realm'] = "Server_Name_1";
$name_realm2['realm'] = "Server_Name_2";
$name_realm3['realm'] = "Server_Name_3";
$website['version'] = "4.0.6a";
$website_2['version'] = "3.3.5a";
$website_3['version'] = "4.0.6a";
$TypeServ = "PVE";
$TypeServ_2 = "PVE";
$TypeServ_3 = "PVP";
$DropServ = "x3";
$DropServ_2 = "x3";
$DropServ_3 = "x3";
$ExpServ = "x3";
$ExpServ_2 = "x3";
$ExpServ_3 = "x3";
$realm_count = '3';
$charLimit = '10';
$mysql_cod = 'cp1251';

# Comunity Links ############

$comun_link['Facebook'] = "http://www.facebook.com/";          // Your adress of Facebook comunity
$comun_link['Twitter'] = "http://twitter.com//";               // Your adress of Twitter comunity
$comun_link['Youtube'] = "http://www.youtube.com/";            // Your adress of Youtube comunity

# ImageShack connection #############

$apikey = "";													// Your API key ImageShack
$apiuser = "";													// Your API user ImageShack
$apipass = "";													// Your API password ImageShack

# Important #############

$website['title'] = "WoWFailureCMS";
$website['slogan'] = "WoWFailureCMS, get your best CMS today, simple and fast!";
$website['address'] = "http://localhost";
$website['root'] = "/";

######################

$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
mysql_select_db($server_db,$connection_setup)or die(mysql_error());

if(isset($_SESSION['username'])){
	$username = mysql_real_escape_string($_SESSION['username']);
	$account_information = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE username = '".$username."'"));
	$account_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$account_information['id']."'"));
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());
}
?>
