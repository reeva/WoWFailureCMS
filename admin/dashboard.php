<?php
require "../configs.php";

if( $_POST['accountName'] and !isset($_SESSION['username']) ) { 
	$accountName = mysql_real_escape_string($_POST['accountName']);
    $accountPass = mysql_real_escape_string($_POST['password']);

    $sha_pass_hash = sha1(strtoupper($accountName ) . ":" . strtoupper($accountPass));

    $db_setup = mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
    $login_query = mysql_query("SELECT * FROM account WHERE username = UPPER('".$accountName."') AND sha_pass_hash = CONCAT('".$sha_pass_hash."')");
    $login = mysql_fetch_assoc($login_query);
    if($login){
		$_SESSION['username']=$accountName;	
		header("Location: dashboard.php");
	} else header("Location: index.html");
}

switch($core) {
	case "skyfire":
		$acess_level = mysql_fetch_assoc( mysql_query("SELECT gmlevel FROM account_access WHERE id =".$account_information['id']) );
	break;
	
	case "strawberry":
		$acess_level = $account_information['gmlevel'];
	break;
}

if($acess_level['gmlevel']=="0") header("Location: ../index.php");

if( $_GET['ndel'] ) mysql_query("DELETE FROM `news` WHERE `id` = ".$_GET['ndel']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AquaFlame CMS Admin Panel</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select").uniform();
      });
    </script>
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
		<script src="YUI/2.6.0/build/yahoo-dom-event/yahoo-dom-event.js" type="text/javascript"></script>
		<script src="YUI/2.6.0/build/calendar/calendar-min.js" type="text/javascript"></script>
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
		<link href="YUI/2.6.0/build/fonts/fonts-min.css" rel="stylesheet" type="text/css" />
		<link href="YUI/2.6.0/build/calendar/assets/skins/sam/calendar.css" rel="stylesheet" type="text/css" />
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
        <li><a href="#b"><span>Image Gallery</span></a></li>
      </ul>
              <? include "navbar.php"; ?>
              <img src="images/shadow.png" class="shadow" alt="" /> </div>
    <!--Content Start-->
    <div id="content">
              <div class="datalist">
        <div class="heading">
                  <h2>News Manager</h2>
                  <select name="sort">
            <option>Sort By</option>
            <option>Option1</option>
            <option>Option2</option>
          </select>
                </div>
        <ul id="lst">
                  <li>
            <div class="chk"><a id="checkall"></a> </div>
            <p class="title"><strong>Title</strong></p>
            <p class="descripHead">Description</p>
            <p class="editHead">Edit/Delete</p>
          </li>
         
         <?php
		 	$query_news = mysql_query("SELECT * FROM news");
			while( $riga=mysql_fetch_array($query_news) ){
				?>
             <li class="odd">
                <div class="chk">
                          <label>
                    <input class="chkl" type="checkbox" name="chk" value="checkbox" />
                  </label>
               </div>
                <p class="title"><?=$riga['title'];?></p>
                <p class="descrip"><?=$riga['content'];?></p>
                <p class="edit"><a href="writenews.php?edit=<?=$riga['id'];?>"><img src="images/editIco.png" alt="" /></a> <a href="?ndel=<?=$riga['id'];?>"><img src="images/deletIco.png" alt="" /></a></p>
          </li>       
         <?		
			}
		 ?>         
                </ul>
      </div>
              <img src="images/sepLine.png" alt="" class="sepline" />
              <div class="messages"></div>
              <div id="calen">
        <div id="yuicalendar1"></div>
        <script type="text/javascript">
// BeginWebWidget YUI_Calendar: yuicalendar1 

  (function() { 
    var cn = document.body.className.toString();
    if (cn.indexOf('yui-skin-sam') == -1) {
      document.body.className += " yui-skin-sam";
    }
  })();

  var inityuicalendar1 = function() {
    var yuicalendar1 = new YAHOO.widget.Calendar("yuicalendar1");

    // The following event subscribers demonstrate how to handle
    // YUI Calendar events, specifically when a date cell is 
    // selected and when it is unselected.
    //
    // See: http://developer.yahoo.com/yui/calendar/ for more 
    // information on the YUI Calendar's configurations and 
    // events.
    //
    // The YUI Calendar API cheatsheet can be found at:
    // http://yuiblog.com/assets/pdf/cheatsheets/calendar.pdf
    //
    //--- begin event subscribers ---//
    yuicalendar1.selectEvent.subscribe(selectHandler, yuicalendar1, true);
    yuicalendar1.deselectEvent.subscribe(deselectHandler, yuicalendar1, true);
    //--- end event subscribers ---//

    yuicalendar1.render();
  }

  function selectHandler(event, data) {
  // The JavaScript function subscribed to yuicalendar1.  It is called when
  // a date cell is selected.
  //
  // alert(event) will show an event type of "Select".
  // alert(data) will show the selected date as [year, month, date].
  };

  function deselectHandler(event, data) {
  // The JavaScript function subscribed to yuicalendar1.  It is called when
  // a selected date cell is unselected.
  };    

  // Create the YUI Calendar when the HTML document is usable.
  YAHOO.util.Event.onDOMReady(inityuicalendar1);


// EndWebWidget YUI_Calendar: yuicalendar1 
    </script> 
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
