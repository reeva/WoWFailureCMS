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
              <div class="datalist">
        <div class="heading">
                  <h2>Latest <span rel="tooltip" title="<strong style='color:red'>Forum Posts</strong><br/><br/>Here you can see the latest 4 Posts of the Forum<br />Click on the <strong>Forum</strong> to redirect on the main page of the Forum Posts." style="color:#ff9200;font-weight:bold;font-size:14px;"><a href="forumposts.php">Forum</a></span> Posts</h2>
                  <select name="sort">
            <option>Sort By</option>
            <option>Option1</option>
            <option>Option2</option>
          </select>
                </div>
        <ul id="lst">
                  <li>
            <div class="chk"><a id="checkall"></a> </div>
			<p class="editHead"><strong>Edit/Delete</strong></p>
            <p class="title"><strong>Title</strong></p>
            <p class="descripHead">Description</p>
            <p class="incHead">Replies</p>
          </li>

            <li class="odd">
            <div class="chk">
            <label>
            <input class="chkl" type="checkbox" name="chk" value="checkbox" />
            </label>
            </div>
            <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
            </div>
            <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
           </div>
           <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
            </div>
            <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                </ul> 
				</div>
				<img src="images/sepLine.png" alt="" class="sepline" />
				<div class="datalist">
	   <div class="heading">
                  <h2>Latest <span rel="tooltip" title="<strong style='color:red'>News Posts</strong><br/><br/>Here you can see the latest 4 Posts of the News<br />Click on the <strong>News</strong> to redirect on the main page of the News Posts." style="color:#ff9200;font-weight:bold;font-size:14px;"><a href="viewnews.php">News</a></span> Posts</h2>
                  <select name="sort">
            <option>Sort By</option>
            <option>Option1</option>
            <option>Option2</option>
          </select>
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
            $result = mysql_query("SELECT id,title,content,comments FROM news ORDER BY date DESC LIMIT 4");
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
          <p> All rights reserved.  |  Powered by: <a href="" target="_blank"><font color="#15509E">AquaFlame CMS</font></a></p>
        </div>
</body>
</html>
