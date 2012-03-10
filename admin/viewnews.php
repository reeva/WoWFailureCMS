<?php
include("../configs.php");
	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT gmlevel from account inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
  //Limit of results per page 
  $size=10; 
  //Look for the number page, if not then first
  if (!isset($_GET["page"])) { 
    $start = 0; //the first result to show, 1, 26... 
    $page=1; //If no page found then first page
  } 
  else {
      $page = $_GET["page"];  
    $start = ($page - 1) * $size;   //Calculate the first result to show
  }
  mysql_select_db($server_db) or die (mysql_error());
  $num_r = mysql_num_rows(mysql_query("SELECT id FROM news"));
  $num_p = ceil($num / $size);
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
		<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select").uniform();
      });
    </script>
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
	<script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);
	</script>
	<script type="text/javascript">
	$(document).ready(function()
{
   $( '#checkall' ).live( 'click', function() {
				
				$( '.chkl' ).each( function() {
					$( this ).attr( 'checked', $( this ).is( ':checked' ) ? '' : 'checked' );
				}).trigger( 'change' );
 
			});
  $('#checkall').click(function(){

 $('span').toggleClass('checked');
$('#checkall').toggleClass('clicked');

 }); 
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
          <li><a href="viewnews.php">News</a></li>
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
          <li><a href="#a"><span>Server Functions</span></a></li>
	        <li><a href="#b"><span>Account Services</span></a></li>
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
              <img src="images/shadow.png" class="shadow" alt="" /> </div>
    <!--Content Start-->
    <div id="content">
		  <img src="images/sepLine.png" alt="" class="sepline" />
			<div class="datalist">
	     <div class="heading">
        <h2>News Posts</h2>
        <select name="sort">
          <option>Sort By</option>
          <option>Option1</option>
          <option>Option2</option>
        </select>
      </div>
      <div style="text-align:right;margin-right:30px;">
        <?php
          if ($num_p > 1){
         if ($page > 1){echo '<a href="news.php?page='.($page-1).'" style="color:#43ACFB;text-decoration:none;">Prev. </a>|';}
         if ($page > 2){echo '<a href="news.php?page=1" style="color:#43ACFB;text-decoration:none;"> 1 </a>...';}
         echo '<a href="news.php?page=1" style="color:#43ACFB;text-decoration:none;"> '.$page.' </a>';
         if ($page < $num_p-1){echo '...<a href="news.php?page='.$num_p.'" style="color:#43ACFB;text-decoration:none;"> '.$num_p.' </a>';}
         if ($page < $num_p){echo '|<a href="news.php?page='.($page+1).'" style="color:#43ACFB;text-decoration:none;"> Next</a>';}
         }
        ?>
      </div>
      <ul id="lst">
        <li>
          <div class="chk"><a id="checkall"></a> </div>
			    <p class="editHead"><strong>Edit/Delete</strong></p>
          <p class="title"><strong>Title</strong></p>
          <p class="descripHead">Description</p>
          <p class="incHead">Replies</p>
        </li>
           <?php
            mysql_select_db($server_db) or die (mysql_error());
            $result = mysql_query("SELECT id,title,content,comments FROM news ORDER BY date DESC LIMIT $start,$size");
            while ($new = mysql_fetch_assoc($result)){
              echo'
            <li>
            <div class="chk">
              <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
            </div>
            <p class="edit"><a href="editnews.php?id='.$new['id'].'"><img src="images/editIco.png" alt="" /></a> <a href="deletenews.php?id='.$new['id'].'"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">'.$new['title'].'</p>
            <p class="descrip">'.substr(strip_tags($new['content']),0,90).'</p>
            <p class="inc">'.$new['comments'].'</p>
            </li>';
            }?>
      </ul>
    </div>
    <img src="images/sepLine.png" alt="" class="sepline" />
             <!--  <div class="messages">
        <div><img src="images/warningIco.png" alt="" />
                  <p>Warning Message, Lorem ipsum dolor sit amet, consectetur adipiscing elit Pellentesque quis.</p>
                </div>
        <div><img src="images/infoIcon.png" alt="" />
                  <p>Information Message, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
        <div><img src="images/success.png" alt="" />
                  <p>Success Message, Lorem ipsum dolor sit amet, Nam bibendum sagittis lobortis.consectetur.</p>
                </div>
        <div><img src="images/errorIco.png" alt="" />
                  <p>Error Message, Lorem ipsum dolor sit amet, Nam bibendum sagittis lobortis.consectetur.</p>
                </div>
      </div> -->
              <div id="calen">
        <div id="yuicalendar1"></div>
      </div>
            </div>
  </div>
          <div class="push"></div>
        </div>
<div id="foot">
          <p> All rights reserved.  |  Powered by: <a href="" target="_blank"><font color="#15509E">AquaFlame CMS</font></a></p>
        </div>
</body>
</html>
