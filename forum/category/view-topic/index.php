<?php require_once("../../../configs.php"); ?>
<head>
<title><?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="<?php echo $website['root'];?>wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/common.css?v37" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie.css?v37" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie6.css?v37" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie7.css?v37" /><![endif]-->
<link title="World of Warcraft - News" href="/wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/wow.css?v19" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/cms/forums.css?v37" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/cms/cms-common.css?v37" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/cms.css?v19" />
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/cms-ie6.css?v19" /><![endif]-->
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie.css?v19" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie6.css?v19" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie7.css?v19" /><![endif]-->
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/third-party/jquery.js?v37"></script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/core.js?v37"></script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/tooltip.js?v37"></script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/bml.js"></script>
<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
<!--[if IE 6]> <script type="text/javascript">//<![CDATA[try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}//]]></script><![endif]-->
<meta name="title" content="Im looking for someone to play with" />
<link rel="image_src" href="<?php echo $website['root'];?>wow/static/images/icons/facebook/article.jpg" />
</head>
<body class="en-gb logged-in">

<?php
require("../../functions.php");
require("../../functions/post_toHtml.php");
?>

<div id="wrapper">
<?php include("../../../header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<?php
if($_GET['t'] != ""){
	$error = 0;
	$threadid = intval($_GET['t']);
	$ndate = date('Y-m-d H:i:s');
	
	$thread = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_threads WHERE id = '".$threadid."'"))or $error=1;
	$update = mysql_query("UPDATE forum_threads SET views = views + 1 WHERE id = '".$thread['id']."'");
	$forum = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE id = '".$thread['forumid']."'"))or $error=1;
	$category = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".$forum['categ']."'"))or $error=1;
	if(isset($_SESSION['username'])){ $userInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$account_information['id']."'")); }
	
	echo '
	<li><a href="'.$website['root'].'index.php" rel="np">'.$website['title'].'</a></li>
	<li><a href="'.$website['root'].'forum" rel="np">Forums</a></li>
	<li><a href="'.$website['root'].'forum" rel="np">'.$category['name'].'</a></li>
	<li><a href="'.$website['root'].'forum/category/?f='.$forum['id'].'" rel="np">'.$forum['name'].'</a></li>
	<li class="last"><a href="../?t='.$thread['id'].'" rel="np">'.$thread['name'].'</a></li>
	';
	
}else $error=1;

if($error == 1){
	echo '
	<li><a href="'.$website['root'].'index.php" rel="np">'.$website['title'].'</a></li>
	<li class="last"><a href="index.php" rel="np">Forums</a></li>
	';
}else{
	if(isset($_POST['detail']) && $_POST['detail'] != ""){
		$reply = $_POST['detail'];
		$reply = stripslashes($reply);
		$reply = strip_tags($reply);
		$reply = addslashes($reply);
		$reply = nl2br($reply);
		
		$insert = mysql_query("INSERT INTO forum_replies (threadid,forumid,content,author,name,last_date) VALUES ('".$thread['id']."','".$forum['id']."','".mysql_real_escape_string($reply)."','".mysql_real_escape_string($account_information['id'])."','".mysql_real_escape_string($thread['name'])."','".$ndate."')")or print("Could not post the reply!");
		$replies = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_replies WHERE threadid = '".$thread['id']."' ORDER BY id DESC LIMIT 1"));
		$insert = mysql_query("INSERT INTO forum_posts (type,postid) VALUES ('2','".$replies['id']."')");
		$update = mysql_query("UPDATE forum_threads SET last_date = '".$ndate."', replies = replies + 1 WHERE id = '".$thread['id']."'");
		
		if($userInfo['class'] == "blizz"){
			$update = mysql_query("UPDATE forum_threads SET has_blizz = 1 WHERE id = '".$thread['id']."'");
			$insert = mysql_query("INSERT INTO forum_blizzposts (type,author,postid) VALUES ('reply','".$userInfo['id']."','".$replies['id']."')");
		}
		
		$posted = 1;
		
	} else $posted = 0;
}
?>
</ol>
</div>
<div class="content-bot">
<div id="forum-content">

		<script type="text/javascript">
		//<![CDATA[
			$(function(){ Cms.Forum.threadListInit('<?php echo $thread['id']; ?>'); });
		//]]>
	    </script>
		
		<?php
		if($error == 1){
		
			echo '
			<style type="text/css">
				.loader {
				width:24px;
				height:24px;
				background: url("../wow/static/images/loaders/canvas-loader.gif") no-repeat;
			   }
			</style>
			<center>Request thread does not exist...<br /><br /><div class="loader"> </div><br />Redirecting...</center>
			<meta http-equiv="refresh" content="2;url=../index.php"/>
			';
			
		}else{
		?>
		
		<?php if($posted != 1){ ?>
		
		<?php
		echo
			'
			<div class="section-header">
				<div class="blizzard_icon"><a class="nextBlizz" href="#" onmouseover="Tooltip.show(this,\'Jump to first Blizzard Post\');"></a></div>
				<span class="topic">Topic</span>';
				
				$posterAccount = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE id = '".$thread['author']."'"));
				$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$posterAccount['id']."'"));
				
				if($posterInfo['character'] == 0){
					$char['name'] = $posterInfo['firstName'];
					$char['val'] = 0;
				}else{
					$char = mysql_fetch_assoc(mysql_query("SELECT name,level,class,race FROM $server_cdb.characters WHERE guid = '".$posterInfo['character']."'"));
					$char['val'] = 1;
				}
				
				if($thread['prefix'] != "none"){
					echo '( '.$thread['prefix'];
					if($thread['locked'] == 1){ echo ' Locked )';}else{ echo ' )'; }
				}else{
					if($thread['locked'] == 1){ echo '( Locked )';}
				}
				echo '
				<span class="sub-title">'.$thread['name'].'</span>
			</div>
		
			<div class="forum-actions top">
				<div class="actions-panel">
					<a class="ui-button button1 imgbutton " href="../?f='.$thread['forumid'].'"><span><span><span class="back-arrow"> </span></span></span></a>';
					if(isset($_SESSION['username']))
					{
						if($userInfo['class'] == "" && $thread['locked'] == 1)
							echo '<a class="ui-button button1 disabled " href="javascript:;"><span><span>Add a reply</span></span></a>';
						else
							echo '<a class="ui-button button1" href="#new-post"><span><span>Add a reply</span></span></a>';
							
					}else echo '<a class="ui-button button1 disabled " href="javascript:;"><span><span>Add a reply</span></span></a>';
					echo '		
					<span class="clear"><!-- --></span>
				</div>
			</div>
		
			<div id="thread">';

				switch($posterInfo['class']){
				case "blizz":
				echo '<div id="post-1" class="post blizzard">';
				break;
				case "mvp":
				echo '<div id="post-1" class="post mvp">';
				break;
				default:
				echo'<div id="post-1" class="post general">';
				break;
				}
				
				echo '
				<span id="1"></span>
				<div class="post-interior">
					<table>
					<tr>
					
						<!-- User Images -->
						<td class="post-character">
						<div class="post-user">
							<div class="avatar">
								<div class="avatar-interior">
										<a href="#"><img height="84" src="'.$website['root'].'images/avatars/2d/'.$posterInfo['avatar'].'" alt="" /></a>
								</div>
							</div>
							
							<div class="character-info">
								<div class="user-name">
									<span class="char-name-code" style="display: none">'.$char['name'].'</span>
									
									<div id="context-2" class="ui-context">
										<div class="context">
											<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
											<div class="context-user"><strong>'.$char['name'].'</strong></div>
											<div class="context-links">
											<a href="#" title="View posts" rel="np" class="icon-posts link-first link-last">View posts</a>
											</div>
										</div>
									</div>
									
									<a href="javascript:;" class="context-link" rel="np">'.$char['name'].'</a>
								</div>
								';
								
								switch($posterInfo['class']){
								case "blizz": echo '<div class="blizzard-title">Staff Member</div>'; break;
								case "mvp": echo '<div class="mvp-title">Moderator</div>'; break;
								default: 
									echo'<div>';
										if($char['val'] == 1){
										echo '
										<div class="character-desc"><span class="color-c5">'.$char['level'].' '.race($char['race']).' '.classx($char['class']).'</span></div>
										<div class="guild"><a href="#">No Guild</a></div>
										<div class="achievements">0</div>
										';
										} echo '<div class="character-desc"><span class="color-c5">No Characters</span></div>';
									echo '</div>';
								break;
								}
								
								echo'
							</div>
						</div>
						</td>
						<!-- End User Thingy -->
						
						<td>';
							if($thread['edited'] == 1)
							{
								$editorInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$thread['editedby']."'"));
								echo '<div class="post-edited">Edited by '.$editorInfo['firstName'].' on '.$thread['last_date'].'</div>';
							}
							
							$content=$thread['content'];
							$content=stripslashes($content);
							$content=postX($content,$posterInfo['class']);
							$content=str_replace("<br>", "\n", $content);
							$i=1;
							
							
							echo'
							<div class="post-detail">'.$content.'</div>
						</td>
						
						<td class="post-info">
								<div class="post-info-int">
									<div class="postData">
										<a href="#'.$i.'">#'.$i.'</a>
										<div class="date" onmouseover="Tooltip.show(this,\'Posted Date : '.$thread['date'].'\')">'.ago(strtotime($thread['date'])).'</div>
									</div>
									<div class="karma">
									<div class="karma-feedback">
									Rate is Disabled. 
									</div>
									<span class="clear"><!-- --></span>
									</div>
									
									<!--<div class="blizzard_icon"><a class="nextBlizz" href="#" onmouseover="Tooltip.show(this,\'Next Blizzard Post\')"></a></div>-->
								</div>
						</td>
					</tr>
					</table>';
					// Goes on Rate is Disabled if not Logged in-> <a href="?login" onclick="return Login.open(https://eu.battle.net/login/login.frag)">Login</a>
					// Goes only if Logged In. ONLY if you are Logged in.
					// <div class="karma">
					// <div class="rate-btn-holder">
					// <a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'up',1,'')" class="rateup rate-btn"><span>Like</span></a>
					// </div>
					// <div class="rate-btn-holder">
					// <a href="javascript:;" onclick="$(this).siblings('.rate-action').show();" class="ratedown rate-btn"></a>
					// <div class="rate-action" style="display: none; ">
					// <div class="ui-dropdown">
					// <div class="dropdown-wrapper">
					// <ul>
					// <li><a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'down',1,'')">Dislike</a></li>
					// <li><a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'down',2,'')">Trolling</a></li>
					// <li><a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'down',3,'')">Spam</a></li>
					// <li><a href="javascript:;" onclick="Cms.Topic.report(POSTNUMBER,'CHARNAME','post-POSTNUMBER')" class="report">Report</a></li>
					// </ul>
					// </div>
					// </div>
					// </div>
					// </div>
					// <div class="prev-vote">You have already rated this item.</div>
					// <span class="clear"><!-- --></span>
					// </div>
					$postid = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_posts WHERE type = 1 AND postid = '".$thread['id']."'"));
					### POST OPTIONS ###
					if(isset($_SESSION['username']))
					{
						echo '
						<div class="post-options">';
							if($thread['locked'] == 1)
							{
								if($userInfo['class'] != ""){
									echo '<div class="respond">';
									
										if($thread['author'] == $userInfo['id']){
											echo'<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>Edit</span></span></a>';
										}
										
										echo '
										<a class="ui-button button2 " href="#new-post">
											<span><span>Reply</span></span>
										</a>
										
										<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$thread['id'].');">
											<span><span><span class="icon-quote">Quote</span></span></span>
										</a>
										
									</div>';
								}else echo '<div class="no-post-options"><!-- --></div>';
							}else{
								echo '
								<div class="respond">';
									if($thread['author'] == $userInfo['id']) echo'<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>Edit</span></span></a>';
									
									echo '
									<a class="ui-button button2 " href="#new-post">
										<span><span>Reply</span></span>
									</a>
									
									<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$thread['id'].');">
										<span><span><span class="icon-quote">Quote</span></span></span>
									</a>
								</div>';
							}
							
						echo '
						<span class="clear"><!-- --></span>
						</div>
						';
					}
					###############
				
					echo '
				</div>
			</div>';
			// Thread Post - End
			$get_replies = mysql_query("SELECT * FROM forum_replies WHERE threadid = '".$thread['id']."' ORDER BY id ASC");
			if(mysql_num_rows($get_replies) > 0)
			{
			$i++;
				while($reply = mysql_fetch_array($get_replies))
				{
					$postid = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_posts WHERE type = 2 AND postid = '".$reply['id']."'"));
					$posterAccount = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE id = '".$reply['author']."'"));
					$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$posterAccount['id']."'"));
					
					if($posterInfo['character'] == 0){
						$char['name'] = $posterInfo['firstName'];
						$char['val'] = 0;
					}else{
						$char = mysql_fetch_assoc(mysql_query("SELECT name, level,race,class FROM $server_cdb.characters WHERE guid = '".$posterInfo['character']."'"));
						$char['val'] = 1;
					}
					
					switch($posterInfo['class']){
					case "blizz":
					echo '<div id="post-'.$i.'" class="post blizzard">';
					break;
					case "mvp":
					echo '<div id="post-'.$i.'" class="post mvp">';
					break;
					default:
					echo'<div id="post-'.$i.'" class="post general">';
					break;
					}
					
					echo'
					<span id="'.$i.'"></span>
					<div class="post-interior">
						<table>
							<tr>
								<td class="post-character">
									<div class="post-user">
										<div class="avatar">
											<div class="avatar-interior">
													<a href="#">
														<img height="84" src="'.$website['root'].'images/avatars/2d/'.$posterInfo['avatar'].'" alt="" />
													</a>
											</div>
										</div>
									
										<div class="character-info">
											<div class="user-name">
												<span class="char-name-code" style="display: none">'.$char['name'].'</span>
												
												<div id="context-2" class="ui-context">
													<div class="context">
														<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
														<div class="context-user"><strong>'.$char['name'].'</strong></div>
														<div class="context-links">
														<a href="#" title="View posts" rel="np" class="icon-posts link-first link-last">View posts</a>
														</div>
													</div>
												</div>
									
												<a href="javascript:;" class="context-link" rel="np">'.$char['name'].'</a>
											</div>';
											
											switch($posterInfo['class']){
												case "blizz":
												echo '<div class="blizzard-title">Staff Member</div>';
												break;
												case "mvp":
												echo '<div class="mvp-title">Moderator</div>';
												break;
												default:
												echo'
												<div>';
												if($char['val'] == 1){ echo'
												<div class="character-desc"><span class="color-c5">'.$char['level'].' '.race($char['race']).' '.classx($char['class']).'</span></div>
												<div class="guild"><a href="#">No Guild</a></div>
												<div class="achievements">0</div>'; }else{
												echo '<div class="character-desc"><span class="color-c5">No Characters</span></div>';
												}
												echo'
												</div>';
												break;
											}
											echo'
										</div>
									</div>
								</td>
								
								<td>';
									if($reply['edited'] == 1)
									{
										$editorInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$reply['editedby']."'"));
										echo '<div class="post-edited">Edited by '.$editorInfo['firstName'].' on '.$reply['last_date'].'</div>';
									}
									
									$content=$reply['content'];
									$content=postX($content,$posterInfo['class']);
								   
									echo'<div class="post-detail">'.stripslashes($content).'<br><br></div>
								</td>
								
								<td class="post-info">
									<div class="post-info-int">
										<div class="postData">
											<a href="#'.$i.'">#'.$i.'</a>
											<div class="date" onmouseover="Tooltip.show(this,\'Posted Date : '.$reply['date'].'\')">'.ago(strtotime($reply['date'])).'</div>
										</div>
										
										<!--<div class="blizzard_icon"><a class="nextBlizz" href="#" onmouseover="Tooltip.show(this,\'Next Blizzard Post\')"></a></div>-->
									</div>
								</td>
							</tr>
						</table>
					
						<div class="post-options">';
							if(isset($_SESSION['username'])){
								if($thread['locked'] == 1){
									if($userInfo['class'] != ""){
										echo '<div class="respond">';
											if($reply['author'] == $userInfo['id']) echo'<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>Edit</span></span></a>';
											echo'									
											<a class="ui-button button2 " href="#new-post">
												<span><span>Reply</span></span>
											</a>
											
											<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$reply['id'].');">
												<span><span><span class="icon-quote">Quote</span></span></span>
											</a>
										</div>';
									}else echo '<div class="no-post-options"><!-- --></div>';
								}else{
									echo '
									<div class="respond">';
										if($reply['author'] == $userInfo['id']) echo'<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>Edit</span></span></a>';
										echo'
										<a class="ui-button button2 " href="#new-post">
											<span><span>Reply</span></span>
										</a>
										<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$reply['id'].');">
											<span><span><span class="icon-quote">Quote</span></span></span>
										</a>
									</div>';
								}
							}
						echo'
						<span class="clear"><!-- --></span>
						</div>
					</div>
					</div>';
					$i++;
				}
			}
			?>
        </div>

	<div class="talkback">
		<?php
		if(!isset($_SESSION['username'])) $post=0;
		else{
			if($thread['locked'] == "1"){
				if($userInfo['class'] == "") $post=0;
				else $post=1;
			}else $post=1;
		}
	
		if($post == 1){
			if($userInfo['character'] == 0){
				$char['name'] = $userInfo['firstName'];
				$char['val'] = 0;
			}else{
				$char = mysql_fetch_assoc(mysql_query("SELECT name, level,race,class FROM $server_cdb.characters WHERE guid = '".$userInfo['character']."'"));
				$char['val'] = 1;
			}
			?>
				<a id="new-post"></a>
				<form method="post" onsubmit="return Cms.Topic.postValidate(this);" action="#<?php echo $i++; ?>">
					<div>
						<input type="hidden" name="xstoken" value="272c2eb0-9252-4eae-b494-93fd89788702" />
						<input type="hidden" name="sessionPersist" value="forum.topic.post" />
						<div class="post general">
							<div class="post-user-details"><h4>Reply to Thread</h4>
							<div class="post-user ajax-update">
							<div class="avatar">
							<div class="avatar-interior">
									<a href="#">
										<img height="84" src="<?php echo $website['root'];?>images/avatars/2d/<?php echo $userInfo['avatar']; ?>" alt="" />
									</a>
							</div>
							</div>
							<div class="character-info">
							<div class="user-name">
							<span class="char-name-code" style="display: none"><?php echo $char['name']; ?></span>
							<a href="#" class="context-link" rel="np"><?php echo $char['name']; ?> </a>
							</div>

							<div class="userCharacter">
								<?php if($char['val'] == 1){ ?>
								<div class="character-desc">
									<span class="color-c1">
										<?php echo $char['level'].' '.race($char['race']).' '.classx($char['class']); ?>
									</span>
								</div>
								<div class="achievements">0</div>
								<?php } ?>
							</div>

							</div>
							</div>
							</div>

							<div class="post-edit">
								<div id="post-errors"></div>

								<div class="talkback-controls">
									<a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'preview')" class="preview-btn"><span class="arr"></span><span class="r"></span><span class="c">Preview</span></a>
									<a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'edit')" class="edit-btn selected"><span class="arr"></span><span class="r"></span><span class="c">Edit</span></a>
								</div>
								
								<div class="editor1" id="post-edit">
									
									<a id="editorMax" rel="5000"></a>
									
									<textarea id="detail" name="detail" class="post-editor" cols="78" rows="13"></textarea>
									
									<script type="text/javascript">
										//<![CDATA[
										$(function() {
											Wow.addBmlCommands();
											BML.initialize('#post-edit', false);
										});
										//]]>
									</script>
								</div>

								<div class="post-detail" id="post-preview"></div>
								
								<div class="talkback-btm">
									<table class="dynamic-center ">
									<tr>
									<td>
										<div id="submitBtn">
											<button class="ui-button button1 " type="submit"><span><span>Submit</span></span></button>
										</div>
									</td>
									</tr>
									</table>
								</div>
							</div>
							<span class="clear"><!-- --></span>
						</div>
					</div>
				</form>
				<span class="clear"><!-- --></span>
			<?php
		}
		else{
		?>
		
		<a id="new-post"></a>
			<div>
				<div class="post general">
					<table class="dynamic-center">
						<tr>
							<td>
								<?php
								if(isset($_SESSION['username'])) echo 'This thread is locked';
								else echo 'In order to post you must to be logged in';
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
		<?php
		}
		?>
		
		<span class="clear"><!-- --></span>
		<?php
		}else{ 
			
			$_POST['detail'] = "";
			$link = '?t='.$threadid;
			echo '<center><br /><br />Forum Post created...<br />';
			echo '
			<style type="text/css">
			.loader {
			  width:24px;
			  height:24px;
			  background: url("'.$website['root'].'wow/static/images/loaders/canvas-loader.gif") no-repeat;
			 }
			</style>';
			echo '<div class="loader"></div><br /></center>';
			echo '<meta http-equiv="refresh" content="0;url='.$link.'"/>';
		}
		?>
		<div class="talkback-code">
			<div class="talkback-code-interior">
                <div class="talkback-icon">
                    <h4 class="code-header">Please report any Code of Conduct violations, including:</h4>
                    <p>Threats of violence. <strong>We take these seriously and will alert the proper authorities.</strong></p>
                    <p>Posts containing personal information about other players. <strong>This includes physical addresses, e-mail addresses, phone numbers, and inappropriate photos and/or videos.</strong></p>
                    <p>Harassing or discriminatory language. <strong>This will not be tolerated.</strong></p>
                    	<p>Click <a href="http://battle.net/community/conduct">here</a> to view the Forums Code of Conduct.</p>
                </div>
			</div>
        </div>
	</div>
</div>


<?php } ?>
 </div>
</div>
</div>
<?php include("../../../footer.php"); ?>
</body>
</html>