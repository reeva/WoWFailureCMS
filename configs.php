<?php
session_save_path('phpsessions');
if (!isset($_SESSION)){  session_start(); }


# Languages ############

$lang = &$_SESSION['local'];
if(isset($_GET['Local'])) $lang = $_GET['Local'];
else if($lang == "") $lang = 'en-us';

$langs = Array("en-us", "ro-ro", "en-db", "it-it", "de-de", "es-es", "bu-bg", "es-mx", "gr-gr", "ru-ru", "zh-cn", "zh-tw", "fr-fr");
if(in_array($lang,$langs)) require_once("/lang/".$lang.".php");
else require_once("/lang/en-us.php");

######################


# Mysql ################

$serveraddress = "127.0.0.1";
$serveruser = "root";
$serverpass = "ascent";
$serverport	= "3306";

$server_db = "site";
$server_adb = "auth";

$server_cdb = "characters";
$server_wdb = "world";

$server_cdb_2 = "characters";
$server_wdb_2 = "world";

######################


# Extra ################

$donatadmin = "ascent";
$website['realm'] = "Set Realmlist Your_Realmlist";
$charTable = 'characters';
$name_realm1['realm'] = "Server_Name_1";
$name_realm2['realm'] = "Server_Name_2";
$realm_count = '1';
$charLimit = '10';
$mysql_cod = 'cp1251';

######################

# Important #############

$website['title'] = "WoWFailureCMS";
$website['slogan'] = "WoWFailureCMS, get your best CMS today, simple and fast!";
$website['address'] = "http://www.wowfailure.co.cc";
$website['root'] = "";

######################

$connection_setup = mysql_connect($serveraddress,$serveruser,$serverpass)or die(mysql_error());
mysql_select_db($server_db,$connection_setup)or die(mysql_error());

if(isset($_SESSION['username'])){
	mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
	$username = mysql_real_escape_string($_SESSION['username']);
	$lbrspa = mysql_query("SELECT * FROM account WHERE username = '".$username."'");
	$account_information = mysql_fetch_assoc($lbrspa);
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());
}
?>
<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>