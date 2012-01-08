<?php if(!isset($_SESSION['username'])){ ?>
<div class="user-plate">
<a href="?login" class="card-login" onclick="BnetAds.trackImpression('Battle.net Login', 'Character Card', 'New'); return Login.open('login.php');">
<strong>Log in now</strong> to enhance and personalize your experience!
</a>
<div class="card-overlay"></div>
</div>
<?php }else{
  $side = rand(1,2);
  switch($side){
    case 1:
      $side = "alliance";
    break;
    case 2:
      $side = "horde";
    break;
  } 
  	mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
    $login_query = mysql_query("SELECT * FROM $server_adb.account WHERE username = '".mysql_real_escape_string($_SESSION["username"])."'");
    $login2 = mysql_fetch_assoc($login_query);	
	$uI = mysql_query("SELECT * FROM $server_db.users WHERE id = '".$login2['id']."'");
	$userInfo = mysql_fetch_assoc($uI);
	mysql_select_db($server_cdb ,$connection_setup)or die(mysql_error());
	$chars_query = mysql_query("SELECT name, class, race, level, gender FROM characters WHERE account = ". $login2['id'] ." ORDER BY guid ASC LIMIT 1");
	if(mysql_num_rows($chars_query) > 0){
		if($userInfo['character'] == 0){
			$chars_query2 = mysql_query("SELECT name, class, race, level, gender, guid FROM $server_cdb.characters WHERE account = ". $login2['id'] ." ORDER BY guid ASC LIMIT 1");
			$actualchar = mysql_fetch_assoc($chars_query2);
			$character_id = $actualchar['guid'];
			$avatar = $actualchar['race']."-0.jpg";	
			$update = mysql_query("UPDATE $server_db.users SET `avatar` = '".$avatar."', `character` ='".$character_id."' WHERE id = '".$userInfo['id']."'");
			
		}else{
			$chars_query2 = mysql_query("SELECT name, class, race, level, gender, guid FROM $server_cdb.characters WHERE guid = ".$userInfo['character']."");
			$actualchar = mysql_fetch_assoc($chars_query2);
		}
		$numchars = mysql_num_rows($chars_query);
	switch( $actualchar["race"] )
	{
		case 2:
		case 5:
		case 6:
		case 8:
		case 10: $side = "horde";
		break;
		default: $side = "alliance";
	}
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());
	?>
<div class="user-plate">
<div id="user-plate" class="card-character plate-0 ajax-update" style="background: url(<?php echo $website['root']; ?>wow/static/images/2d/card/<?php echo $actualchar["race"] . "-" . $actualchar["gender"];?>.jpg) 0 100% no-repeat;">
<div class="card-overlay"></div>
<span class="hover"></span>
</a>
<div class="meta">
<div class="player-name"><?php echo strtolower($_SESSION['username']); ?></div>
	  
	  <div class="character">
	  <a class="character-name context-link" href="#" rel="np" data-tooltip="Change character"><?php echo $actualchar["name"]; ?><span class="arrow"></span></a>
	  <div class="guild">
<a class="guild-name" href="#">
<?php echo $name_realm1['realm'] ?>
</a>
</div>
		<div id="context-1" class="ui-context character-select">
		
		  <div class="context">
			<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
			
			<div class="context-user">
			<strong><?php echo $actualchar["name"]; ?></strong>
			<br />
			<span class="realm up"><?php echo $name_realm1['realm'] ?></span>
			</div>
		  
			<div class="context-links">
			<a href="#" title="Profile" class="icon-profile link-first">Profile</a>
			<a href="#" title="View my posts" class="icon-posts"> </a>
			<a href="#" title="View auctions" rel="np"class="icon-auctions"> </a>
			<a href="#" title="View events" rel="np" class="icon-events link-last"> </a>
			</div>
		  </div>
		  <div class="character-list">
			<div class="primary chars-pane">
			  <div class="char-wrapper">
	<?php	
		mysql_select_db($server_cdb ,$connection_setup)or die(mysql_error());
		$chars_query = mysql_query("SELECT * FROM characters WHERE account = ". $login2['id'] ." ORDER BY guid ASC");
		$numchars = mysql_num_rows($chars_query);
		mysql_select_db($server_db,$connection_setup)or die(mysql_error());
			while( $char = mysql_fetch_array($chars_query) ){
				switch($char["race"]){
					case '1': $_race = "Human";
						break;
					case '2': $_race = "Orc";
						break;
					case '3': $_race = "Dwarf";
						break;
					case '4': $_race = "Night Elf";
						break;
					case '5': $_race = "Undead";
						break;
					case '6': $_race = "Tauren";
						break;
					case '7': $_race = "Gnome";
						break;
					case '8': $_race = "Troll";
						break;
					case '9': $_race = "Goblin";
						break;
					case '10': $_race = "Blood Elf";
						break;
					case '11': $_race = "Draenei";
						break;
					case '22': $_race = "Worgen";
						break;
					default: $_race = "All Races";
				}
				
				switch($char["class"]){
					case '1': $_class = "Warrior";
						break;
					case '2': $_class = "Paladin";
						break;
					case '3': $_class = "Hunter";
						break;
					case '4': $_class = "Rogue";
						break;
					case '5': $_class = "Priest";
						break;
					case '6': $_class = "Death Knight";
						break;
					case '7': $_class = "Shaman";
						break;
					case '8': $_class = "Mage";
						break;
					case '9': $_class = "Warlock";
						break;
					case '11': $_class = "Druid";
						break;
					default: $_class = "All Class";
				}			
				?>
			  <a href="?cc=<?php echo $char['guid']; ?>" class="char <?php echo ( $char["guid"] == $actualchar["guid"] ? 'pinned' : ''); ?>" rel="np">
			  <span class="pin"></span>
			  <span class="name"><?php echo $char["name"]; ?></span>
			  <span class="class color-c<?php echo $char["class"] ?>"><?php echo $char["level"] . " " . $_race . " " . $_class; ?></span>
			  <span class="realm"><?php echo $name_realm1['realm'] ?></span>
			  </a>
			  <?php
			  }
			  if(isset($_GET['cc'])){
				$character_id = intval($_GET['cc']);
				$select = mysql_fetch_assoc(mysql_query("SELECT guid,race,gender FROM $server_cdb.characters WHERE guid = '".$character_id."'"));
				$avatar = $select['race']."-".$select['gender'].".jpg";	
				$update = mysql_query("UPDATE users SET `avatar` = '".$avatar."', `character` ='".$character_id."' WHERE id = '".$userInfo['id']."'");
				echo '<meta http-equiv="refresh" content="1;url=index.php"/>';
			  }
			   ?>
			  </div>
			  <a href="#" class="manage-chars" onclick=""><!--CharSelect.swipe('in', this); return false;-->
			  <span class="plus"></span>
			  Manage Characters<br />
			  <span>Customize characters that appear in this menu.</span>
			  </a>
			</div>
			<!--
			<div class="secondary chars-pane" style="display: none">
			<div class="char-wrapper scrollbar-wrapper" id="scroll">
			<div class="scrollbar">
			<div class="track"><div class="thumb"></div></div>
			</div>
			<div class="viewport">
			<div class="overview">
			<a href="javascript:;"
			class="color-c1 pinned"
			rel="np"
			onmouseover="Tooltip.show(this, $(this).children('.hide').text());">
			<img src="/wow/static/images/icons/race/2-0.gif" alt="" />
			<img src="/wow/static/images/icons/class/1.gif" alt="" />
			28 Aghman
			<span class="hide">Orc Warrior (Burning Steppes)</span>
			</a>
			<a href="/wow/en/character/burning-steppes/stefyvolt/"
			class="color-c2"
			rel="np"
			onclick="CharSelect.pin(1, this); return false;"
			onmouseover="Tooltip.show(this, $(this).children('.hide').text());">
			
			<img src="/wow/static/images/icons/race/10-0.gif" alt="" />
			<img src="/wow/static/images/icons/class/2.gif" alt="" />
			80 Stefyvolt
			<span class="hide">Blood Elf Paladin (Burning Steppes)</span>
			</a>
			<a href="/wow/en/character/burning-steppes/taylda/"
			class="color-c6"
			rel="np"
			onclick="CharSelect.pin(2, this); return false;"
			onmouseover="Tooltip.show(this, $(this).children('.hide').text());">
			<img src="/wow/static/images/icons/race/10-1.gif" alt="" />
			<img src="/wow/static/images/icons/class/6.gif" alt="" />
			62 Taylda
			<span class="hide">Blood Elf Death Knight (Burning Steppes)</span>
			</a>
			<a href="/wow/en/character/burning-steppes/stefybank/"
			class="color-c1"
			rel="np"
			onclick="CharSelect.pin(3, this); return false;"
			onmouseover="Tooltip.show(this, $(this).children('.hide').text());">
			<img src="/wow/static/images/icons/race/6-0.gif" alt="" />
			<img src="/wow/static/images/icons/class/1.gif" alt="" />
			5 Stefybank
			
			<span class="hide">Tauren Warrior (Burning Steppes)</span>
			</a>
			<a href="/wow/en/character/arathi/pvpsausage/"
			class="color-c7"
			rel="np"
			onclick="CharSelect.pin(4, this); return false;"
			onmouseover="Tooltip.show(this, $(this).children('.hide').text());">
			<img src="/wow/static/images/icons/race/2-0.gif" alt="" />
			<img src="/wow/static/images/icons/class/7.gif" alt="" />
			1 Pvpsausage
			<span class="hide">Orc Shaman (Arathi)</span>
			</a>
			<a href="/wow/en/character/ragnaros/adenor/"
			class="color-c6"
			rel="np"
			onclick="CharSelect.pin(5, this); return false;"
			onmouseover="Tooltip.show(this, $(this).children('.hide').text());">
			<img src="/wow/static/images/icons/race/11-0.gif" alt="" />
			<img src="/wow/static/images/icons/class/6.gif" alt="" />
			61 Adenor
			<span class="hide">Draenei Death Knight (Ragnaros)</span>
			</a>
			
			<div class="no-results hide">No characters were found</div>
			</div>
			</div>
			</div>
			<div class="filter">
			<input type="input" class="input character-filter" value="Filter�" alt="Filter�" /><br />
			<a href="javascript:;" onclick="CharSelect.swipe('out', this); return false;">Return to characters</a>
			</div>
			</div>
			-->
		  </div>
		</div>
	  </div>
	</div>
	</div>
	<script type="text/javascript">

	//<![CDATA[
	$(document).ready(function() {
	Tooltip.bind('#header .user-meta .character-name', { location: 'topCenter' });
	});
	//]]>
	</script>
	<?php }else{
	echo '<div class="user-plate">
	<div id="user-plate" class="card-character plate-0 ajax-update" style="background: url('.$website['root'].'wow/static/images/2d/card/0-0.jpg) 0 100% no-repeat;">
	<div class="card-overlay"></div>
	<span class="hover"></span>
	</a>
	<div class="meta">
	<div class="player-name">';
	echo strtolower($_SESSION['username']);
	echo '</div>
	<div class="character">
	  <a class="character-name context-link" href="#" rel="np" data-tooltip="Change character">0 Characters</span></a>
	  <div class="guild">
	<a class="guild-name" href="#">';
	echo $name_realm1['realm'];
	echo '</a></div></div></div></div>
		</div>';
	
	} }
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());?>