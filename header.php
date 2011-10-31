<div id="header">
		
	<h1 id="logo"></h1>
	
	<div class="header-plate-wrapper">
		<div class="header-plate">
			<ul id="menu">

			<?php if(isset($page_cat)){
			require_once("configs_lang.php");
      ?>
			<li class="menu-home"><a href="<?php echo $website['root']; ?>index.php" <?php if($page_cat=='home') echo'class="active"';?>><span><?php echo $home['home']; ?></span></a></li>
			<li class="menu-game"><a href="<?php echo $website['root']; ?>status.php" <?php if($page_cat=='game') echo'class="active"';?>><span><?php echo $status['status']; ?></span></a></li>
			<li class="menu-community"><a href="<?php echo $website['root']; ?>community.php" <?php if($page_cat=='community') echo'class="active"';?>><span><?php echo $Community['Community']; ?></span></a></li>
			<li class="menu-media"><a href="<?php echo $website['root']; ?>media.php" <?php if($page_cat=='media') echo'class="active"';?>><span><?php echo $Media['Media']; ?></span></a></li>
			<li class="menu-forums"><a href="<?php echo $website['root']; ?>forum/" <?php if($page_cat=='forums') echo'class="active"';?>><span><?php echo $Forums['Forums']; ?></span></a></li>
			<li class="menu-services"><a href="<?php echo $website['root']; ?>services.php" <?php if($page_cat=='services') echo'class="active"';?>><span><?php echo $Services['Services']; ?></span></a></li>
			</ul>
			<?php
			if($page_cat == "forums"){ include("../userplate.php"); }else{ include("userplate.php"); }
			}else{ ?>
			<li class="menu-home"><a href="<?php echo $website['root']; ?>index.php"><span><?php echo $home['home']; ?></span></a></li>
			<li class="menu-game"><a href="<?php echo $website['root']; ?>status.php"><span><?php echo $status['status']; ?></span></a></li>
			<li class="menu-community"><a href="<?php echo $website['root']; ?>community.php"><span><?php echo $Community['Community']; ?></span></a></li>
			<li class="menu-media"><a href="<?php echo $website['root']; ?>media.php"><span><?php echo $Media['Media']; ?></span></a></li>
			<li class="menu-forums"><a href="<?php echo $website['root']; ?>forum/"><span><?php echo $Forums['Forums']; ?></span></a></li>
			<li class="menu-services"><a href="<?php echo $website['root']; ?>services.php"><span><?php echo $Services['Services']; ?></span></a></li>
			</ul>
			<?php include("userplate.php"); } ?>
		</div>
	</div>
</div>