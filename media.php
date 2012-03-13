<?php require_once("configs.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" xmlns:xml="http://www.w3.org/XML/1998/namespace" class="chrome chrome8">
<head>
<title><?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css?v17" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie.css?v17" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie6.css?v17" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie7.css?v17" /><![endif]-->
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow.css?v7" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/media-gallery.css?v17" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/media/media.css?v7" />

<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/media/media-ie6.css?v7" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie.css?v7" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie6.css?v7" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie7.css?v7" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js?v17"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v17"></script>
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
Core.project = 'wow';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/Y';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/wow/player/rating-pegi.jpg';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
//]]>
</script>
</head>

<body class="en-gb game-index">
	<div id="wrapper">
		<?php $page_cat="media"; include("header.php"); ?>
		
		<div id="content">
			<div class="content-top">
				<div class="content-trail">
					<ol class="ui-breadcrumb">
						<li><a href="index.php" rel="np"><?php echo $website['title']; ?></a></li>
						<li class="last"><a href="media.php" rel="np"><?php echo $Media['Media']; ?></a></li>
					</ol>
				</div>
				
				<div class="content-bot">
					<div class="media-content">
						<div id="media-index">
							<div class="media-index-section float-left">
								<a class="gallery-title videos" href="./media/videos_index.php">
								<span class="view-all"><span class="arrow"></span><?php echo $Media['AllVideos']; ?></span>
								<span class="gallery-icon"></span>
                                <?php
								$consulta0 = mysql_query(" SELECT * FROM videos WHERE visible = 1");
								$totalSql = mysql_num_rows($consulta0);
								?>
								Videos <span class="total">(<?php echo $totalSql; ?>)</span>
								</a>

								<?php					
								$consulta1 = mysql_query("SELECT * FROM videos WHERE visible = 1 ORDER BY date DESC LIMIT 0,1");
								while($video1 = mysql_fetch_assoc($consulta1)) {
								?>
                        				
                              	<div class="section-content">
									<a href="./media/videos_visor.php?id=<?php echo $video1['id']; ?>" class="thumb-wrapper video-thumb-wrapper first-video">
									<span class="video-info">
									<span class="video-title"><?php echo substr($video1['title'],0,50); ?></span>
									<span class="video-desc"><?php echo substr($video1['description'],0,50); ?></span>
									<span class="date-added">Fecha: <?php echo $video1['date']; ?></span>
									</span>
									<span class="thumb-bg"; style="background-image: url('http://img.youtube.com/vi/<?php echo $video1['id_url']; ?>/0.jpg'); background-size: 188px 118px">
									<span class="thumb-frame"></span>
									</span>
									<?php } ?>
									</a>
                                    
									<?php					
									$consulta2 = mysql_query("SELECT * FROM videos WHERE visible = 1 ORDER BY date DESC LIMIT 1,1");
									while($video2 = mysql_fetch_assoc($consulta2)) {
									?>                                    									
									<a href="./media/videos_visor.php?id=<?php echo $video2['id']; ?>" class="thumb-wrapper video-thumb-wrapper first-video">
									<span class="video-info">
									<span class="video-title"><?php echo substr($video2['title'],0,50); ?></span>
									<span class="video-desc"><?php echo substr($video2['description'],0,50); ?></span>
									<span class="date-added">Fecha: <?php echo $video2['date']; ?></span>
									</span>
									<span class="thumb-bg"; style="background-image: url('http://img.youtube.com/vi/<?php echo $video2['id_url']; ?>/0.jpg'); background-size: 188px 118px">
									<span class="thumb-frame"></span>
									</span>
									<?php } ?>
									</a>
									
									<span class="clear"><!-- --></span>
								</div>
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-right">
							
								<a class="gallery-title screenshots" href="#">
								<span class="view-all"><span class="arrow"></span>All Screenshots</span>
								<span class="gallery-icon"></span>
								Screenshots <span class="total">(4)</span>
								</a>
								
								<div class="section-content">
									<a class="thumb-wrapper left-col" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/screenshots/races/worgen08-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 16/02/2011</span>

									</a>
									<a class="thumb-wrapper" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/screenshots/classes/druid-troll02-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 15/12/2010</span>
									</a>
									<a class="thumb-wrapper left-col bottom-row" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/screenshots/events/lunar-festival/lunar-festival-ss17-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 01/11/2010</span>
									</a>
									<a class="thumb-wrapper bottom-row" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/screenshots/screenshot-of-the-day/cataclysm/cataclysm-ss1565-index-thumb.jpg)">

									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 01/11/2010</span>
									</a>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<span class="clear"><!-- --></span>
							
							<div class="media-index-section float-left">
								<a class="gallery-title artwork" href="#">
								<span class="view-all"><span class="arrow"></span>All Artwork</span>
								<span class="gallery-icon"></span>
								Artwork <span class="total">(2)</span></a>
								
								<div class="section-content">
									<a class="thumb-wrapper left-col" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/artwork/trading-card-game/series1/tcg-series1-009-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 18/04/2011</span>
									</a>
									<a class="thumb-wrapper" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/artwork/wow-cataclysm/artwork-worgenvgoblin-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 14/04/2011</span>
									</a>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-right">
								<a class="gallery-title wallpapers" href="#">
								<span class="view-all"><span class="arrow"></span>All Wallpapers</span>
								<span class="gallery-icon"></span>
								Wallpapers <span class="total">(2)</span>
								</a>
								
								<div class="section-content">
									<a class="thumb-wrapper left-col" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/wallpapers/comics/comic-worgen02/comic-worgen02-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>

									<span class="date-added">Date Added: 30/03/2011</span>
									</a>
									<a class="thumb-wrapper" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/wallpapers/comics/comic-worgen05/comic-worgen05-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 30/03/2011</span>
									</a>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-left">
								<a class="gallery-title comics" href="#">
								<span class="view-all"><span class="arrow"></span>All Comics</span>

								<span class="gallery-icon"></span>
								Comics <span class="total">(2)</span>
								</a>
								<div class="section-content">
									<a class="thumb-wrapper left-col" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/comics/comic-2011-04-02-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: 19/04/2011</span>
									</a>
									<a class="thumb-wrapper" href="#">
									<span class="thumb-bg" style="background-image:url(http://eu.media.blizzard.com/wow/media/comics/comic-2011-04-01-index-thumb.jpg)">
									<span class="thumb-frame"></span>
									</span>

									<span class="date-added">Date Added: 06/04/2011</span>
									</a>
									<span class="clear"><!-- --></span>
								</div>
								<span class="clear"><!-- --></span>
							</div>
							
							<span class="clear"><!-- --></span>
						</div>
					</div>
					<div style="display:none" id="media-preload-container"></div>
					</div>
				</div>
			</div>
		
			<?php include("footer.php"); ?>
		
		</div>
	</div>

</body>
</html>