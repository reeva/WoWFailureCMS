<?php
require_once("configs.php");
require("functions/armory_func.php");
$page_cat = "services";

if (isset($_GET['search']) && !empty($_GET['search'])) {    //Here starts the search
    $error=false;
        
    $term = $_GET['search'];  //Get the term search
    
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);              //connect to DB
    $sqlc = "SELECT guid,level,name,race,class,gender FROM `" . $server_cdb .
        "`.`characters` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";    //Get searchs for characters    
    $sqlg = "SELECT guildid FROM `" . $server_cdb .
        "`.`guild` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";       //Searchs for guilds    
    $sqla = "SELECT arenaTeamId FROM `" . $server_cdb .
        "`.`arena_team` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";  //Searchs for arena
    $sqlf = "SELECT id FROM `" . $server_db .                                                      
        "`.`forum_threads` WHERE name LIKE '% " . mysql_real_escape_string($term) . " %'
        OR name LIKE '" . mysql_real_escape_string($term) . " %' OR name LIKE '% " . mysql_real_escape_string($term) . "'";  
        //Searchs for forum threads, search the exactly word, at begining, at end or in the middle
    $num_char = mysql_num_rows(mysql_query($sqlc,$conn));    //Get number of matchs for the menu
    $num_guild = mysql_num_rows(mysql_query($sqlg,$conn));
    $num_arena = mysql_num_rows(mysql_query($sqla,$conn));
    $num_forum = mysql_num_rows(mysql_query($sqlf,$conn));
    $total = $num_char+$num_guild+$num_arena+$num_forum; //To know if show no results found
      
}
if (empty($_GET['search'])){
  $error=true;
$no_results='<div class="no-results"><h3 class="subheader">'.$search['again'].'</h3>           
  <h3 class="category">'.$search['sugg'].'</h3>
  <ul><li>'.$search['sugg1'].'</li><li>'.$search['sugg2'].'</li><li>'.$search['sugg3'].'</li></ul></div>';     //Echo for empty search
}
elseif ($total < 1){
  $error=true;
$no_results='<div class="no-results"><h3 class="subheader">'.$search['noResults1'].'<span>'.$term.'</span>'.$search['noResults2'].'</h3>           
  <h3 class="category">'.$search['sugg'].'</h3>
  <ul><li>'.$search['sugg1'].'</li><li>'.$search['sugg2'].'</li><li>'.$search['sugg3'].'</li></ul></div>';     //Echo for no results found
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
<title>Search - <?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie.css?v35" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie6.css?v35" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie7.css?v35" /><![endif]-->
<link title="World of Warcraft - News" href="feed/newshtml.html" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/cms/search.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/search.css" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie.css?v18" /><![endif]--><!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie6.css?v18" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie7.css?v18" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/wow/static';
Core.sharedStaticUrl= '/wow/static/local-common';
Core.baseUrl = '/wow/en';
Core.projectUrl = '/wow';
Core.cdnUrl = 'http://eu.media.blizzard.com';
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'wow';
Core.locale = 'en-gb';
Core.language = 'en';
Core.buildRegion = 'eu';
Core.region = 'eu';
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/wow/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/wow/rating-pegi.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-gb search-win">
	<div id="wrapper">
  	<?php include("header.php"); ?>
  	<div id="content">
      <div class="content-top">
      	<div class="content-trail">
        	<ol class="ui-breadcrumb">
          	<li>
            	<a href="index.php" rel="np">World of Warcraft</a>
          	</li>
          	<li>
            	<a href="services.php" rel="np"><?php echo $Services['Services']; ?></a>
          	</li>
          	<li class="last">
            	<a href="search.php" rel="np"><?php echo $Ind['Ind2']; ?></a>
          	</li>
        	</ol>
      	</div>
      	<div class="content-bot">
        	<div class="search">
          	<div class="search-left">
            	<div class="search-header">
              	<h2 class="header "><?php echo $Ind['Ind2']; ?></h2>
            	</div>
            	<?php 
            	if (!$error){
            	 echo '<ul class="dynamic-menu" id="menu-search">
              	<li class="item-active"><a href=""><span class="arrow">'.$search['summ'].'</span></a></li>';
              	if ($num_char>0){ echo '<li><a href="search_c.php?search='.$term.'"><span class="arrow">'.$status['chars'].' ('.$num_char.')'.'<span></span></span></a></li>';}
	              if ($num_guild>0){ echo '<li><a href="search_g.php?search='.$term.'"><span class="arrow">'.$guild['Guilds'].' ('.$num_guild.')'.'<span></span></span></a></li>';}
               	if ($num_arena>0){ echo '<li><a href="search_a.php?search='.$term.'"><span class="arrow">'.$arena['Teams'].' ('.$num_arena.')'.'<span></span></span></a></li>';}
               	if ($num_forum>0){ echo '<li><a href="search_f.php?search='.$term.'"><span class="arrow">'.$Forums['Forums'].' ('.$num_forum.')'.'<span></span></span></a></li>';}
            	 echo '</ul>';} ?>
            </div>  
          	<div class="search-right">
            	<div class="search-header">
              	<form action="" method="get" class="search-form">
              	<div>
                	<input id="search-page-field" type="text" name="search" maxlength="200" tabindex="2" value="" />
                	<button class="ui-button button1" type="submit"><span><span><?php echo $Ind['Ind2']; ?></span></span></button>
               	</div>
              	</form>
            	</div>
            	<?php if ($error){echo $no_results; } ?>
            	<div class="helpers">
              	<h3 class="subheader ">
                <?php if (!$error){echo $search['sumResults'].'<span>'.$term.'</span>';} ?>
                </h3>
            	</div>
	<!-- No pagination code. -->
	            <div class="summary">
	            <?php 
              if (!$error && $num_char > 0){
                $sql = $sqlc." LIMIT 3";
                $result = mysql_query($sql,$conn) or die(mysql_error());
                echo '<div class="results results-grid wow-results">
	                   <h3 class="category "><a href="search_c.php?search='.$term.'">'.$status['chars'].'</a> ('.$num_char.')</h3>';
                while ($row = mysql_fetch_array($result)) {
                  echo'
                    <div class="grid">
	                    <div class="wowcharacter">
	                      <a href="threed.php?name='.$row['name'].'" class="icon-frame frame-56 thumbnail">
	                      <img src="/images/avatars/2d/'.$row['race'].'-'.$row['gender'].'.jpg" alt="" width="56" height="56" /></a>
	                      <a href="threed.php?name='.$row['name'].'" class="color-c'.$row['class'].'">
	                      <strong>'.$row['name'].'</strong></a><br />'.$row['level'].'&nbsp;'.$armory['race'.$row['race']].'&nbsp;'.$armory['class'.$row['class']].'<br />'.$name_realm1['realm'].'
	                      <span class="clear"><!-- --></span>
	                     </div>
	                   </div>';
	               }
	               echo '<span class="clear"><!-- --></span></div>'; 
               }?>
               <?php
               if (!$error && ($num_arena || $num_guild)){
                  echo '<div class="results results-grid wow-results">';
                  if ($num_arena > 0){
                      $sql = "SELECT arenaTeamId,name,type FROM `" . $server_cdb .
                      "`.`arena_team` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%' LIMIT 1";
                      $result = mysql_query($sql, $conn) or die(mysql_error());
                      $row = mysql_fetch_array($result);
                      echo'<div class="grid">
	                     <h4 class="subcategory "><a href="?q=primo&amp;f=wowguild">'.$arena['Teams'].'</a> ('.$num_arena.')</h4>
	                     <div class="wowguild"><canvas id="tabard-3125133" class="thumbnail" width="32" height="32"></canvas>
	                     <a href="" class="sublink"><strong>'.$row['name'].'</strong></a> - '.$row['type'].'<br />
	                     <span data-tooltip="REALM NAME">'.$name_realm1['realm'].'</span>
	                     <span class="clear"><!-- --></span></div></div>';
                  }
	                  if ($num_guild > 0){
	                    $sql = "SELECT guildid,G.name,C.race FROM `" . $server_cdb .
                      "`.`guild` G,`" . $server_cdb ."`.`characters` C WHERE leaderguid=C.guid AND
                      G.name LIKE '%" . mysql_real_escape_string($term) . "%' LIMIT 1";
                      $result = mysql_query($sql, $conn) or die(mysql_error());
                      $row = mysql_fetch_array($result);
                      echo'<div class="grid">
	                     <h4 class="subcategory "><a href="search_g.php?search='.$term.'">'.$guild['Guilds'].'</a> ('.$num_guild.')</h4>
	                     <div class="wowguild"><canvas id="tabard-3125133" class="thumbnail" width="32" height="32"></canvas>
	                     <a href="" class="sublink"><strong>'.$row['name'].'</strong></a> - '.$armory['Faction'.translateLet($row['race'])].'<br />
	                     <span data-tooltip="REALM NAME">'.$name_realm1['realm'].'</span><span class="clear"><!-- --></span></div></div>';
                    }
	                echo '<span class="clear"><!-- --></span>
	             </div>';
               }?>
	           </div>
	         </div>
		       <span class="clear"><!-- --></span>
	       </div>
	     </div>
	   </div>
	</div>
  <?php 
  mysql_end($conn);
  include("footer.php"); ?>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
},
ui: {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.'
},
grammar: {
colon: '{0}:',
first: 'First',
last: 'Last'
},
fansite: {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
},
search: {
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
other: 'Other'
}
};
//]]>
</script>
<script type="text/javascript" src="/wow/static/local-common/js/menu.js?v35"></script>
<script type="text/javascript" src="/wow/static/js/wow.js?v18"></script>
<script type="text/javascript">
//<![CDATA[
$(function(){
Menu.initialize('/data/menu.json');
Search.initialize('/ta/lookup');
});
//]]>
</script>
<script type="text/javascript" src="/wow/static/local-common/js/utility/dynamic-menu.js?v35"></script>
<script type="text/javascript" src="/wow/static/js/character/guild-tabard.js?v18"></script>
<script type="text/javascript" src="/wow/static/js/character/arena-flag.js?v18"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("/wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v35");
Core.load("/wow/static/local-common/js/search.js?v35");
Core.load("/wow/static/local-common/js/login.js?v35", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo $website['root'];?>loginframe.php';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="/wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v35"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "https://ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "http://www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script>
</body>
</html>