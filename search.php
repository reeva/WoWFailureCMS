<?php
require_once("configs.php");
$page_cat = "services";
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
<title>Search - <?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="http://eu.battle.net/wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie.css?v35" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie6.css?v35" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie7.css?v35" /><![endif]-->
<link title="World of Warcraft - News" href="feed/newshtml.html" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wowe6dd.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/cms/search.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/search.css" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie.css?v18" /><![endif]--><!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie6.css?v18" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie7.css?v18" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/wow/static';
Core.sharedStaticUrl= '/wow/static/local-common';
Core.baseUrl = '/wow/en';
Core.projectUrl = '/wow';
Core.cdnUrl = 'http://eu.media.blizzard.com/';
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
Flash.ratingImage = '../../../eu.media.blizzard.com/global-video-player/ratings/wow/rating-pegi.jpg';
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
	<a href="services.php" rel="np">Services</a>
	</li>
	<li class="last">
	<a href="search.php" rel="np">Search</a>
	</li>
	</ol>
	</div>
	<div class="content-bot">
	<div class="search">
	<div class="search-right">
			<div class="search-header">
				<form action="" method="post" class="search-form">
					<div>
						<input id="search-page-field" type="text" name="search" maxlength="200" tabindex="2" value="" />
	<button
		class="ui-button button1 "
			type="submit">
		<span>
			<span>Search</span>
		</span>
	</button>
					</div>
				</form>
			</div>

	<span class="clear"><!-- --></span>
        </div>
		<div class="search-left">
			<div class="search-header">
	<h2 class="header ">					Search
</h2>
			</div>
	<ul class="dynamic-menu" id="menu-search">

			
				<li class="item-active">
					<a href="">
						<span class="arrow">Summary</span>
					</a>

				</li>

			
				<li>
					<a href="">
						<span class="arrow">No characters</span>
					</a>

				</li>
	</ul>
            </div>
	<div class="view-table">
	<div class="table ">
	<table>
	
			<?php
require ('configs.php');

function mysql_open($host,$user,$pass){
	$conn = mysql_connect($host,$user,$pass) or die(mysql_error());
	return $conn;
}
function mysql_end($resc){
	mysql_close($resc);
}


function translate($race)
{
    $faction = "";
    switch ($race) {
        case "1":
        case "3":
        case "4":
        case "7":
        case "11":
        case "22":
            global $faction;
            $faction = "faction_0.jpg";
            break;
        case "2":
        case "5":
        case "6":
        case "8":
        case "9":
        case "10":
            global $faction;
            $faction = "faction_1.jpg";
            break;
    }
    return $faction;
}

if (isset($_GET['charname'])) {
    $cont = new wowheadparser();
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);
    $sql = "SELECT guid,name,class,level,race,gender FROM `" . $server_cdb .
        "`.`characters` WHERE name='" . mysql_real_escape_string($_GET["charname"]) .
        "'";
    $result = mysql_query($sql, $conn) or die(mysql_error());
    if ($row = mysql_fetch_array($result)) {
        $items = show_items($row["guid"]);
        $all = array_merge($items);
        $html->load('armory',$all);
    }
    mysql_end($conn);
} elseif (empty($_POST['search'])) {
    
} elseif (isset($_POST['search'])) {
    
    $term = $_POST['search'];
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);
    $sql = "SELECT guid,name,class,level,race,gender FROM `" . $server_cdb .
        "`.`characters` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";
    $result = mysql_query($sql, $conn) or die(mysql_error());
    while ($row = mysql_fetch_array($result)) {
        //echo $row['name'];
        echo '<thead>
	<tr>
	<th width="15%" class=" first-child">
	<a href="" class="sort-link" >
	<span class="arrow">Name</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Level</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Race</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Class</span>
	</a>
	</th>
	<th width="6%">
	<a href="" class="sort-link" >
	<span class="arrow">Faction</span>
	</a>
	</th>
	<th width="15%">
	<a href="" class="sort-link" >
	<span class="arrow">Guild</span>
	</a>
	</th>
	<th>
	<a href="" class="sort-link" >
	<span class="arrow">Realm</span>
	</a>
	</th>
	<th class=" last-child">
	<a href="" class="sort-link" >
	<span class="arrow">Battlegroup</span>
	</a>
	</th>
	</tr>
	</thead>
		<tbody>
					<tr class="row1">
	<td>
	<a href="" class="item-link color-c9">
	<span class="icon-frame frame-18">
	<img src="wow/static/images/icons/faction/'.translate($row["race"]).'" alt="" width="18" height="18" />
	</span>
	<strong><a href="craracter.php?name='.$row["name"].'">'.$row["name"].'</a></strong>
	</a>
	</td>
	<td class="align-center">'.$row["level"].'</td>
	<td class="align-center">
	<span class="icon-frame frame-14 " data-tooltip="'.$row['race'].'">
	<img src="wow/static/images/icons/race/'.$row['race'].'-'.$row['gender'].'.gif" alt="" width="14" height="14" />
	</span>
	</td>
	<td class="align-center">
	<span class="icon-frame frame-14 " data-tooltip="">
	<img src="wow/static/images/icons/class/'.$row["class"].'.gif" alt="" width="14" height="14" />
	</span>
	</td>
	<td class="align-center">
	<span class="icon-frame frame-14 " data-tooltip="">
	<img src="wow/static/images/icons/faction/'.translate($row["race"]).'" alt="" width="14" height="14" />
	</span>
	</td>
	<td>
	</td>
	<td>'.$name_realm1['realm'].'</td>
	<td>Loading...</td>
	</tr></tbody>';
    }
    
    mysql_end($conn);
}

?>
	
	
	</table>
	</div>
	</div>
	
</div>
</div>
</div>
	</div>
	<?php include("functions/footer_man.php"); ?>
	<?php include("functions/footer_man_nav.php"); ?>
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
<script type="text/javascript" src="../static/local-common/js/menua1c4.js?v35"></script>
<script type="text/javascript" src="../static/js/wow2e13.js?v18"></script>
<script type="text/javascript">
//<![CDATA[
$(function(){
Menu.initialize('/data/menu.json');
Search.initialize('/ta/lookup');
});
//]]>
</script>
<script type="text/javascript" src="../static/local-common/js/utility/dynamic-menua1c4.js?v35"></script>
<script type="text/javascript" src="../static/js/character/guild-tabard2e13.js?v18"></script>
<script type="text/javascript" src="../static/js/character/arena-flag2e13.js?v18"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("../static/local-common/js/third-party/jquery-ui-1.8.6.custom.mina1c4.js?v35");
Core.load("../static/local-common/js/searcha1c4.js?v35");
Core.load("../static/local-common/js/logina1c4.js?v35", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = 'https://eu.battle.net/login/login.frag';
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
var src = "../../../ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "../../../www.google-analytics.com/ga.js";
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