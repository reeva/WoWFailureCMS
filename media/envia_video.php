<?php
include("../configs.php"); ?>

<?php
$title = $_POST['title_form'];
$description = $_POST['description_form'];
$url = $_POST['url_form'];
$date = date ("Y-m-d H:i:s", time());

$exp="/v\/?=?([0-9A-Za-z-_]{11})/is";
preg_match_all( $exp , $url , $matches );
$id = $matches[1][0];

mysql_select_db($server_adb);
$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
$login = mysql_fetch_assoc($check_query);

mysql_select_db($server_db);
$save_video = mysql_query("INSERT INTO videos (author, date, id_url, title, description, url) VALUES ('".$login['id']."','".$date."','".$id."','".$title."','".$description."','".$url."');") or die(mysql_error());
if ($save_video == true){
echo '<div class="alert-page" align="center">'.$Media['VidSendSuccse'].'</div>';
echo '<meta http-equiv="refresh" content="7;url=send_video.php"/>';
}
else{
echo '<div class="errors" align="center"><font color="red">'.$Media['ErrorSendVid'].'</font></div>';
}
mysql_close($connection_setup);
?>