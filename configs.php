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

$serveraddress = "localhost";
$serveruser = "root";
$serverpass = "**********";
$serverport	= "3306";

$server_db = "web";
$server_adb = "auth";

$server_cdb = "char";
$server_wdb = "world";

######################


# Extra ################

$website['realm'] = "Set Realmlist logon.yourserver.com";
$mysql_cod = 'cp1251';
$name_realm1['realm'] = "Name of your 1st Realm"; //Temporal Fix for new changes, TEMPORAL

# Comunity Links ############

$comun_link['Facebook'] = "http://www.facebook.com/pages/Voragine-Gaming/377582425600832";          // Your adress of Facebook comunity
$comun_link['Twitter'] = "http://twitter.com//";               // Your adress of Twitter comunity
$comun_link['Youtube'] = "http://www.youtube.com/";            // Your adress of Youtube comunity

# Important #############

$website['title'] = "Your Server Name";
$website['slogan'] = "Your server slogan!";
$website['address'] = "http://localhost/"; // End with /, it's important
$website['root'] = "/"; // End with /, it's important

######################

# Paypal #############

	// PayPal email
	//--- Receiver of the donations
		$paypal_email="yourpaypalemail@hotmail.com";
	
	// PayPal URL
	//--- set to sandbox.paypal.com for testing purposes
		$paypal="www.paypal.com";
	
	// PayPal postback URL
	//--- Gives the donator his donation points. You only need to edit the domain, not the file name
		$paypal_postback="http://yourwebsite.com/paypal_do.php";
	
	// PayPal return URL
	//--- Return the donator to this page when donated
		$paypal_return="http://localhost.com/dev/index.php";

######################

# Maintenance #############

$maintenance = false; //Change true(maintenance mode)/false(normal mode) to disable/enable website
if($maintenance == true){
  if($bucle_mant == 0 ){                        
    header('Location: maintenance.php');
  }
}else{

############

$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
mysql_select_db($server_db,$connection_setup)or die(mysql_error());

if(isset($_SESSION['username'])){
	$username = mysql_real_escape_string($_SESSION['username']);
	$account_information = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE username = '".$username."'"));
	$account_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$account_information['id']."'"));
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());
}
###########
}
?>