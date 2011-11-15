<?php
session_start();
session_save_path('phpsessions');


/*||||||||||||||||||||||||||||||||||||||||*/
/*|||||||The Language Configuration|||||||*/
/*|||||||||||DO NOT TOUCH THIS||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||*/
if(!empty($_GET['Local']) || !empty($_SESSION['Local'])) {
$lang = $_GET['Local'];
$_SESSION['Local'] = $lang;
$lang = $_SESSION['Local'];
}
else {
$lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0,2);
}
switch ($lang)
{
    case 'us' :
        include ("lang/en-us.php");
        break;
	case 'ro-ro' :
        include ("lang/ro-ro.php");
        break;
    case 'en' :
        include ("lang/en-gb.php");
        break;
    case 'de' :
        include ("lang/de-de.php");
        break;
    case 'bu-bu' :
        include ("lang/bg-bg.php");
        break;
    case 'es' :
        include ("lang/es-es.php");
        break;
    case 'es-mx' :
        include ("lang/es-mx.php");
        break;
    case 'gr' :
        include ("lang/gr-gr.php");
        break;
    case 'ru' :
        include ("lang/ru-ru.php");
        break;
    case 'zh-cn' :
        include ("lang/zh-cn.php");
        break;
    case 'zh-tw' :
        include ("lang/zh-tw.php");
        break;
    case 'fr' :
        include ("lang/fr-fr.php");
        break;
    case 'it' :
        include ("lang/it-it.php");
        break; 		
    default :
        include ("lang/en-us.php");
        $lang = 'en-us';
}
/*||||||||||||||||||||||||||||||||||||||||*/
/*||||||||The Server Configuration||||||||*/
/*||||||||||||||||||||||||||||||||||||||||*/
$serveraddress = "localhost"; // Your MySQL server address
$serveruser = "billys07_7"; // Your MySQL user
$serverpass = "mario123"; //Your MySQL password
$serverport	= "3306"; // Your MySQL Port
$donatadmin = "ascent"; // Your Donation Admin Password
$website['realm'] = "Set Realmlist Your_Realmlist"; // You realm (Example: Set RealmList login.wowfailure.com)
/*||||||||||||||||||||||||||||||||||||||||*/
/*|||||||The Donation Configuration|||||||*/
/*||||||||||||||||||||||||||||||||||||||||*/
// Coming SOON!
/*||||||||||||||||||||||||||||||||||||||||*/
/*|||||||The Website Configuration||||||||*/
/*||||||||||||||||||||||||||||||||||||||||*/
$server_db = "billys07_failure"; //Your website database
$server_adb = "Ezalion-Auth"; //Your account database
$server_cdb = "Ezalion-Characters"; //Your characters database
$server_cdb_2 = "Ezalion-Characters"; //Your characters database
$server_wdb = "Ezalion-World"; //Your world database
$server_wdb_2 = "Ezalion-World"; //Your world database
$charTable = 'characters'; //Your Character Table!!
$name_realm1['realm'] = "Server_Name_1"; //Your Realm Name 1
$name_realm2['realm'] = "Server_Name_2"; //Your Realm Name 2
$charLimit = '10'; //Max characters to show on the page
$website['title'] = "WoWFailureCMS"; // Your Website Title
$website['slogan'] = "WoWFailureCMS, get your best CMS today, simple and fast!"; // Your Website Slogan.
$website['address'] = "http://www.wowfailure.co.cc"; // 'http://url/foldername/' or 'http://url/'
$website['root'] = "./"; // '/' <- for root and '/foldername/' <- for any folder
/*||||||||||||||||||||||||||||||||||||||||*/
/*||||||||||||DO NOT EDIT BELOW|||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||*/
/*||||||||||||DO NOT EDIT BELOW|||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||*/
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