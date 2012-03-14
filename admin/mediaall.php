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
  $num_r = mysql_num_rows(mysql_query("SELECT id FROM media"));
  $num_p = ceil($num / $size);

  //MEDIA TYPES VIEW **** Types: 0-video, 1-screen,2-wall,3-art  I have to confirm with the media updates
  if (!isset($_GET['type']) || $_GET['type'] == 'all' || $_GET['type'] == 'video'){
    //mysql_select_db($server_db);
    //$sql = mysql_query("SELECT title,link,type FROM media ORDER BY date DESC LIMIT 5");
  }
  if (!isset($_GET['type']) || $_GET['type'] == 'all' || $_GET['type'] == 'screen'){
    //mysql_select_db($server_db);
    //$sql = mysql_query("SELECT title,link,type FROM media ORDER BY date DESC LIMIT 5");
  }
  if (!isset($_GET['type']) || $_GET['type'] == 'all' || $_GET['type'] == 'wall'){
    //mysql_select_db($server_db);
    //$sql = mysql_query("SELECT title,link,type FROM media ORDER BY date DESC LIMIT 5");
  }
  if (!isset($_GET['type']) || $_GET['type'] == 'all' || $_GET['type'] == 'art'){
    //mysql_select_db($server_db);
    //$sql = mysql_query("SELECT title,link,type FROM media ORDER BY date DESC LIMIT 5");
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
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
			<div class="datalist">
	     <div class="heading">
        <h2>Approved Media</h2>
        <form method="get" action="">
        <select name="type" onchange="submit(this.form)">
          <option value="all" <?php if(!isset($_GET['type']) || $_GET['type']=='all'){echo 'selected="selected"';} ?>>All</option>
          <option value="video" <?php if($_GET['type']=='video'){echo 'selected="selected"';} ?>>Videos</option>
          <option value="screen" <?php if($_GET['type']=='screen'){echo 'selected="selected"';} ?>>Screen</option>
          <option value="wall" <?php if($_GET['type']=='wall'){echo 'selected="selected"';} ?>>Wallpapers</option>
          <option value="art" <?php if($_GET['type']=='art'){echo 'selected="selected"';} ?>>Art</option>
        </select>
        </form>
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
      <table>
        <thead>
        <tr>
          <th class="chk"><input type="checkbox" /></th>
          <th class="edit"><strong>Recycle</strong></th>
          <th class="title"><strong>Title</strong></th>
          <th class="desc"><strong>Description</strong></th>
          <th class="inc"><strong>Comments</strong></th>
        </tr>
        </thead>
        
     
           <?php
            mysql_select_db($server_db) or die (mysql_error());
            $result = mysql_query("SELECT id,title,description,comments,type FROM media ORDER BY date DESC LIMIT $start,$size");
            while ($new = mysql_fetch_assoc($result)){
              echo'<tbody>
			<tr>
			<th class="chk"><input type="checkbox" /></th>
			<td class="edit">
			<a href="#"><span rel="tooltip" title="&lt;strong style=&quot;color:#00B6FF&quot;&gt;Unapprove&lt;/strong&gt;" style="color:#ff9200;font-weight:bold;font-size:14px;"><img src="images/unIco.png" alt=""></span></a>
			<a href="#"><span rel="tooltip" title="&lt;strong style=&quot;color:#00B6FF&quot;&gt;Delete&lt;/strong&gt;" style="color:#ff9200;font-weight:bold;font-size:14px;"><img src="images/deletIco.png" alt=""></span></a>
			</td>
			<td class="title">'.$new['title'].'</td>
			<td class="desc">'.$new['description'].'</td>
			<td class="inc">'.$new['comments'].'</td>         
			</tr>
			</tbody>';
            }?>
 </table>
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