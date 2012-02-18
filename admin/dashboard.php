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
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="view.php">Users</a></li>
      <li><a href="forms.php">Forums</a></li>
      <li><a href="#">Information</a></li>
      <li class="ddm"><a>News</a>
      <ul class="ddl">
      <li><a href="#">News</a></li>
      <li><a href="#">View</a></li>
      <li><a href="#">Edit</a></li>
      <li><a href="#">Delete</a></li>
      </ul>
      </li>
      </ul>
      <ul id="tablist">
      <li><a href="#a"><span>Server Functions</span></a></li>
      </ul>
              <div id="tabsPanel">
        <div id="a" class="tab_content">
                  <div class='carousel_container'>
            <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                      <ul class='carousel_ul'>
					    <li><a class="ico2" href='#'></a></li>
						<li><a class="ico1" href='editnews.php'></a></li>
						<li><a class="ico3" href='viewnews.php'></a></li>
						<li><a class="ico4" href='viewwebsite.php'></a></li>
						<li><a class="ico5" href='users.php'></a></li>
						<li><a class="ico6" href='calendarandnotes.php'></a></li>
						<li><a class="ico7" href='editdb.php'></a></li>
						<li><a class="ico8" href='deletedb.php'></a></li>
						<li><a class="ico9" href='info.php'></a></li>
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
                  <h2>Latest <a href="forumposts.php">Forum</a> Posts</h2>
                  <select name="sort">
            <option>Sort By</option>
            <option>Option1</option>
            <option>Option2</option>
          </select>
                </div>
        <ul id="lst">
                  <li>
            <!--<div class="chk"><a id="checkall"></a> </div>-->
			<p class="editHead"><strong>Edit/Delete</strong></p>
            <p class="title"><strong>Title</strong></p>
            <p class="descripHead">Description</p>
            <p class="incHead">Replies</p>
          </li>
            <li class="odd">
            <!--<div class="chk">
            <label>
            <input class="chkl" type="checkbox" name="chk" value="checkbox" />
            </label>
   </div>--><p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <!--<div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
                    </div>-->
            <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <!--<div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
                    </div>-->
           <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <!--<div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
                    </div>-->
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
                  <h2>Latest <a href="news.php">News</a> Posts</h2>
                  <select name="sort">
            <option>Sort By</option>
            <option>Option1</option>
            <option>Option2</option>
          </select>
                </div>
        <ul id="lst">
                  <li>
            <!--<div class="chk"><a id="checkall"></a> </div>-->
			<p class="editHead"><strong>Edit/Delete</strong></p>
            <p class="title"><strong>Title</strong></p>
            <p class="descripHead">Description</p>
            <p class="incHead">Replies</p>
          </li>
            <li class="odd">
            <!--<div class="chk">
            <label>
            <input class="chkl" type="checkbox" name="chk" value="checkbox" />
            </label>
   </div>--><p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <!--<div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
                    </div>-->
            <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <!--<div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
                    </div>-->
           <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
                  <li>
            <!--<div class="chk">
                      <label>
                <input class="chkl" type="checkbox" name="chk" value="checkbox" />
              </label>
                    </div>-->
            <p class="edit"><a href="#"><img src="images/editIco.png" alt="" /></a> <a href="#"><img src="images/deletIco.png" alt="" /></a></p>
            <p class="title">Lorem ipsum</p>
            <p class="descrip">Donec vel nunc lacus, non sodales lacus.</p>
            <p class="inc">2</p>
            </li>
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
