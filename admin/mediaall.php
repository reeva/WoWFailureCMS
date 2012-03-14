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
	} /*
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
  $num_p = ceil($num / $size);  Coming soon pagination*/
  
  if ($_GET['sort'] == 'type'){
    $order = ' type ASC, ';
  }
  elseif($_GET['sort'] == 'title'){
    $order = ' title ASC, ';
  }
  else{
    $order = '';
  }
  //MEDIA TYPES VIEW **** Types: 0-video, 1-screen,2-wall,3-art,4-comic
  if ($_GET['type']=='0' || $_GET['type']=='1' || $_GET['type']=='2' || $_GET['type']=='3' || $_GET['type']=='4'){
    $type = " AND type = '".$_GET['type']."' ";
  }else{
    $type = ''; //If not defined type or type all then show all media types
  }
  
  mysql_select_db($server_db) or die (mysql_error());
  $sql_string = "SELECT * FROM media WHERE visible = '1' ".$type." ORDER BY ".$order." date DESC";  
  $sql_query = mysql_query($sql_string); //add limit for pagination work
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
        <h2>Manage Media</h2>
        <form method="get" action="">
          <select name="sort" onchange="submit(this.form)">
            <option value="type">Type</option>
            <option value="title">Title</option>
          </select>
          <select name="type" onchange="submit(this.form)">
            <option value="all" <?php if(!isset($_GET['type']) || $_GET['type']=='all'){echo 'selected="selected"';} ?>>All</option>
            <option value="0" <?php if($_GET['type']=='0'){echo 'selected="selected"';} ?>>Videos</option>
            <option value="1" <?php if($_GET['type']=='1'){echo 'selected="selected"';} ?>>Screen</option>
            <option value="2" <?php if($_GET['type']=='2'){echo 'selected="selected"';} ?>>Wallpapers</option>
            <option value="3" <?php if($_GET['type']=='3'){echo 'selected="selected"';} ?>>Art</option>
            <option value="3" <?php if($_GET['type']=='4'){echo 'selected="selected"';} ?>>Comic</option>
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
          <th class="edit"><strong>Unapprove/Delete</strong></th>
          <th class="title"><strong>Title</strong></th>
          <th class="desc"><strong>Description</strong></th>
          <th class="inc"><strong>Date</strong></th>
          <th class="inc"><strong>Type</strong></th>
        </tr>
        </thead>
        <tbody>
      <?php
      while ($row = mysql_fetch_assoc($sql_query)){
      echo'
        <tr>
          <td class="chk"><input type="checkbox" /></td>
          <td class="edit">
            <a href="media_man.php?id='.$row['id'].'&action=un&orig=mediaall"><img src="images/unIco.png" alt="" /></a>
            <a href="mediadelete.php?id='.$row['id'].'&orig=mediaall"><img src="images/deletIco.png" alt="" /></a>
          </td>
          <td class="title"><a href="'.$row['link'].'" target="_blank">'.$row['title'].'</a></td>
          <td class="desc">';
              if (strlen($row['description']) > 80){
                echo'<span rel="tooltip" title="<strong>'.$row['description'].'</strong>">'.strip_tags(substr($row['description'],0,80)).'...</span>';}
              else{ echo strip_tags($row['description']);}
      echo'</td>
          <td class="inc">Date</td> 
          <td class="inc">Type</td>         
        </tr>';  
      }       
        
      ?>
        </tbody>
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
<?php include("footer.php"); ?>
</body>
</html>