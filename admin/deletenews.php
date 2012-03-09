<?php
include("../configs.php");

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
  
  if (isset($_POST['delete'])){
    mysql_select_db($server_db);
    $delete_new = mysql_query("DELETE FROM news WHERE id = '".$_POST['id']."';");
    if ($delete_new == true){
      echo '<div class="alert-page" align="center"> The article has been deleted successfully!</div>';
      echo '<meta http-equiv="refresh" content="3;url=dashboard.php"/>';
    }
    else{
      echo '<div class="errors" align="center"><font color="red"> An ERROR has occured while deleting the article!</font></div>';
    }
  }
?>      

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title>AquaFlame CMS Admin Panel</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/tooltip.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript" src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
    <script src="js/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
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
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="view.php">News</a></li>
          <li><a href="forms.php">Forums</a></li>
          <li><a href="#">Users</a></li>
          <li class="ddm"><a>Account</a>
            <ul class="ddl">
              <li><a href="#">Account</a></li>
              <li><a href="#">Information</a></li>
              <li><a href="#">Edit</a></li>
              <li><a href="#">Log Out</a></li>
            </ul>
          </li>
        </ul>
        <ul id="tablist">
          <li><a href="#a"><span>Website Functions</span></a></li>
	        <li><a href="#b"><span>Server Functions</span></a></li>
        </ul>
        <div id="tabsPanel">
          <div id="a" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
              <ul class='carousel_ul'>
                <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Write News</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico1" href='writenews.php'></a></span></li>
					      <li><span rel="tooltip" title="<strong style='color:#00B6FF'>View/Edit News</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico3" href='viewnews.php'></a></span></li>
						    
                <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Connectivity</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico2" href='#'></a></span></li>
						    <li><span rel="tooltip" title="<strong style='color:#00B6FF'>View the Website</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico4" href='viewwebsite.php'></a></span></li>
						    <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Users Panel</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico5" href='users.php'></a></span></li>
						    <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Notes and Dates</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico6" href='calendarandnotes.php'></a></span></li>
						    <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Edit the DB</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico7" href='editdb.php'></a></span></li>
						    <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Delete your DB</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico8" href='deletedb.php'></a></span></li>
						    <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Information</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico9" href='info.php'></a></span></li>
              </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>
				  <div id="b" class="tab_content">
            <div class='carousel_container'>
              <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
              <div class='carousel_inner'>
                <ul class='carousel_ul2'>
                  <li><span rel="tooltip" title="<strong style='color:red'>Log Out</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico5" href='logout.php'></a></span></li>
                  <li><span rel="tooltip" title="<strong style='color:#00B6FF'>Account Information</strong>" style="color:#ff9200;font-weight:bold;font-size:14px;"><a class="ico9" href='info.php'></a></span></li>
                </ul>
              </div>
              <div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
            </div>
          </div>
        <!--Tab End--> 
      </div>
      <img src="images/shadow.png" class="shadow" alt="" /> 
    </div>
    <!--Content Start-->
    <div id="content">
      <div class="forms">
        <div class="heading">
          <h2>Delete News</h2>
          <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
        </div>
        <h3>Article Information</h3>
        <form method="post" action="" class="styleForm">
        <table>
        <?php
          if (isset($_GET['id'])){
            mysql_select_db($server_db);
            $new = mysql_fetch_assoc(mysql_query("SELECT id,title,author,date,comments,content FROM news WHERE id = '".$_GET['id']."'"));
            if (!$new['id']){
              $error = true;
            }
          }else{
            $error = true;
          }
          if (!$error) {
          echo'
          <tr>
            <td width="65%"><p><strong>Title: </strong>'.$new['title'].'</p></td>
            <td rowspan="4" style="vertical-align:middle;">
              <p align="center"><strong>Are you sure you want to delete this article?</strong></p>
              <input type="hidden" name="id" value="'.$new['id'].'" />
              <p align="center"><button type="submit" name="delete" onclick="Form.submit(this)"><span>Delete</span></button>
              <a href="dashboard.php"><button name="reset" type="reset" value="Cancel"><span>Cancel</span></button</a></p> 
            </td>
          </tr>
          <tr><td><p><strong>Author: </strong>'.$new['author'].'</p></td></tr>
          <tr><td><p><strong>Date: </strong>'.$new['date'].'</p></td></tr>
          <tr><td><p><strong>Replies: </strong>'.$new['comments'].'</p></td></tr>
          <tr><td colspan="2"><h3>Content:</h3><p>'.$new['content'].'</p></td></tr>';
          }elseif ($delete_new == false){
            echo '<tr><td width="100%"><p align="center"><font color="red"><strong>You have to select an article!</strong></font></p></td></tr>
            <meta http-equiv="refresh" content="2;url=dashboard.php"/>';
          }?>
        </table>
        </form>
      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<div id="foot">
  <p> All rights reserved.  |  Powered by: <a href="" target="_blank"><font color="#15509E">AquaFlame CMS</font></a></p>
</div>
</body>