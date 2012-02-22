<?php
include("../configs.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AquaFlame CMS Admin Panel</title>
    <link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input").uniform();
		$('.sign').click(function(){
			$('.message').fadeIn();
		})
		$('.message').click(function(){
			$('.message').fadeOut();
		})
      });
    </script>
    <link rel="stylesheet" href="css/uniform.default.css" type="text/css" media="screen" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
<div id="login">

      <div id="log-Sup">
   <div id="logWrap">

          <h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
        <span>Admin Login Panel</span></h1>
		<?php
  
  if(!isset($_SESSION['username'])){
  if(isset($_POST['accountName'])){
    $accountName = mysql_real_escape_string($_POST['accountName']);
    $accountPass = mysql_real_escape_string($_POST['password']);

    $sha_pass_hash = sha1(strtoupper($accountName ) . ":" . strtoupper($accountPass));

    $db_setup = mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
    $login_query = mysql_query("SELECT * FROM account WHERE username = UPPER('".$accountName."') AND sha_pass_hash = CONCAT('".$sha_pass_hash."')");
    $login = mysql_fetch_assoc($login_query);
    if($login){
      ?>
      <div id="LogPannel">
      <center><h2>Logging In</h2></center>
	  <meta http-equiv="refresh" content="2"/>
	  </div>
      <!--<div class="loader"></div>-->
      <?php
        $_SESSION['username']=$accountName;
          echo '<meta http-equiv="refresh" content="2;"';
          echo 'Succesfully';
      ?>
      </center>
      <?php
    }else{
      ?>
      <div id="LogPannel">
      <center><h2>Wrong Password or Account Name</h2></center>
	  <meta http-equiv="refresh" content="2"/>
	  </div>
      <!--<div class="loader"></div>-->
      <?php
    }
    
    ?>
    
    
    
  <?php }else{ ?>
  <div id="LogPannel">
  <h2>Administrator Login</h2>
  <form action="?SSID:<?php echo $sessionid; ?>" method="post">
	<input id="accountName" name="accountName" type="text" value="Username" onfocus="if(this.value=='Username')this.value=''" onblur="if(this.value=='')this.value='Username'" />
    <input id="password" name="password" type="password" value="password" onfocus="if(this.value=='password')this.value=''" onblur="if(this.value=='')this.value='password'" />
    <input name="submit" type="submit" data-text="Processing..." value="LOGIN" />        
    <label>
    <input type="checkbox" />
          </label>
              <p>Remember Me</p>
              <p><a class="sign">Forgot Password</a>?</p>
            </form>
			<div class="message">
            <p>Just click <strong>login</strong> to go forward.</p>
			</div>
			</div>
	<?php } }else{
    ?>
    <script>
    parent.postMessage("{\"action\":\"success\"}", "<?php echo $website['address']; ?>");
    </script>
    <?php
    echo '<div id="LogPannel">
      <center><h2><font color="green">You are Logged In</font></h2></center>
	  <meta http-equiv="refresh" content="2;url=dashboard.php"/>
	  </div>
      <!--<div class="loader"></div>-->';
    
  } ?>
        <!--
            <input type="checkbox" />
          </label>
              <p>Remember Me</p>
              <p><a class="sign">Forgot Password</a>?</p>
            </form>
        <div class="message">
              <p>Just click <strong>login</strong> to go forward.</p>-->
        </div>
      </div>
        
      <div class="push"></div>
    </div>
<div id="foot">
      <p> All rights reserved.  |  Powered by: <a href="" target="_blank"><font color="#15509E">AquaFlame CMS</font></a></p>
    </div>
</body>
</html>
