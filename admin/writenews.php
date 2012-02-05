<?php
require "../configs.php";

if( $_GET['edit'] ) {
	$enc= mysql_fetch_assoc( mysql_query("SELECT * FROM `news` WHERE `id` =".$_GET['edit']) );
}

if( $_POST['cont'] ) {
	$body=html_entity_decode( htmlentities($_POST['cont']) );
	$tittle = htmlentities($_POST['tittle']);
	if( !$_GET['edit'] ) mysql_query("INSERT INTO `news` (`id`, `author`, `date`, `content`, `authorlnk`, `contentlnk`, `title`, `comments`, `image`) VALUES
(NULL, '".$_SESSION['username']."', '".date("y")."-".date("n")."-".date("j")."', '$body', NULL, NULL, '$tittle', 0, 'staff');");	
	else mysql_query("UPDATE `news` SET `content` =  '$body',
`title` =  '$tittle' WHERE `id` =".$_GET['edit']);	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AquaFlame CMS Admin Panel</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    <link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <script src="../../../code.jquery.com/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
 $(document).ready(function(){
     $('.ddm').hover(
	   function(){
		 $('.ddl').slideDown();
	   },
	   function(){
		 $('.ddl').slideUp();
	   }
	 );
 });
</script>
    <script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script type="text/javascript" src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <script type="text/javascript" src="js/jquery.cleditor.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor(
			{
				width:        900, // width not including margins, borders or padding
                height:       250, // height not including margins, borders or padding
			}
							 );
      });
    </script>
    </head>

    <body class="bgc">
<div id="admin">
      <div id="wrap">
    <div id="head">
          <h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
        <span>Admin Login Panel</span></h1>
          <ul id="menu">
        <li><a href="dashboard.html">Dashboard</a></li>
        <li><a href="">Styles</a></li>
        <li><a href="forms.html">Forms</a></li>
        <li><a href="#">Table Data</a></li>
        <li class="ddm"><a>Multi-Level Menu</a>
              <ul class="ddl">
            <li><a href="#">Multi-Level Menu</a></li>
            <li><a href="#">Documentation</a></li>
            <li><a href="#">FAQ'S</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
            </li>
      </ul>
          <ul id="tablist">
        <li><a href="#a"><span>Dashboard Links</span></a></li>
        <li><a href="#b"><span>Other Functions</span></a></li>
      </ul>
          <? include "navbar.php"; ?>
          <img src="images/shadow.png" class="shadow" alt="" /> </div>
    <!--Content Start-->
    <div id="content">
          <div class="forms">
        <div class="heading">
              <h2>Write your news</h2>
        </div>
        <form method="post" action="" class="styleForm">
          <div class="txt">
            <p><b>Tittle:</b> <input class="reg" type="text" name="tittle" id="tittle" value="<?=$enc['title'];?>" />
                </p>
                <p><textarea name="cont" id="cont" rows="5" cols="45"><?=$enc['content'];?></textarea></p>
                <p>Image: <input class="reg" type="text" name="tittle" id="tittle" value="staff" /></p>
              </div>
              <input name="save" type="submit" value="Save Changes" />
              <input name="save" type="reset" value="Cancel" />
            </form>
      </div>
        </div>
  </div>
      <div class="push"></div>
    </div>
<div id="foot">
      <p> All rights reserved.  |  Powered by: <a href="" target="_blank"><font color="#15509E">AquaFlame CMS</font></a> | Admin Cp By Raffa50 (Aldrigo Raffaele)</p>
    </div>
</body>
</html>
