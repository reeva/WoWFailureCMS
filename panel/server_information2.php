<div class="realm-cuadro">
	<?php
	  $get_realms = mysql_query("SELECT * FROM $server_adb.realmlist WHERE `id` = 2");
	  while($realm = mysql_fetch_array($get_realms)){
		
	  $host = $realm['address'];
	  $world_port = $realm['port'];
	  $world = @fsockopen($host, $world_port, $err, $errstr, 2);}
	?>
	<div id="sidebar-marketing" class="sidebar-module">
		<div style="font-size:18px; color:#FEF092">
	  <h3 class="title-bnet-ads"><table width="300">
	    <tr><td width="208">
    	<?php echo $name_realm2['realm']; ?></td>
        <td width="79" align="left"><?php
	 	if (! $sock = @fsockopen($host, $world_port, $num, $error, 3))
	  		echo"<font color=red size=2>OFFLINE</font><img src=\"./wow/static/images/icons/down.png\">"; 
	 	else{
	   		echo "<font color=#00FF00 size=2>ONLINE</font><img src=\"./wow/static/images/icons/up.png\">";
	  		fclose($sock);
	  		}
	  	?></td></tr></table>
	  </h3>
	</div>
	
	<span class="clear"><!-- --></span>
	
	<?php
	$sql = mysql_query ("SELECT * FROM $server_adb.`uptime` WHERE `realmid` = 2 ORDER BY `starttime` DESC LIMIT 1");  
	$uptime_results = mysql_fetch_array($sql);    
	
	if($uptime_results['uptime'] > 2592000) $uptime =  round(($uptime_results['uptime'] / 30 / 24 / 60 / 60),2)."".$Status['Months']."";
	elseif($uptime_results['uptime'] > 86400) $uptime =  round(($uptime_results['uptime'] / 24 / 60 / 60),2)."".$Status['Days']."";
	elseif($uptime_results['uptime'] > 3600) $uptime =  round(($uptime_results['uptime'] / 60 / 60),2)."".$Status['Hours']."";
	else $uptime =  round(($uptime_results['uptime'] / 60),2)."".$Status['Min']."";
		
		if (! $sock = @fsockopen($host, $world_port, $num, $error, 3))
			echo "<font color=red><b>".$Status['Uptime:']."</b></font> <span class='date'>0 Min</span> <br>";
		else
			{
			echo "<font color='#00FF00'><b>".$Status['Uptime:']."</b></font> <span class='date'>$uptime</span> <br>";
			}	
	?>
	
	<div class="sidebar-module" id="sidebar">
    	<table width="300" h>
    	  <tr><td width="208" height="18">
    	<?php echo $Ind['Ind6']; ?><span class="date"><?php echo $website_2['version']; ?></span></td>
        <td width="80" align="left">
        <?php echo $Status['Tipe']; ?><span class="date"><?php echo $TypeServ_2; ?></span></td>
    	  </tr>
        <tr><td height="18">
        <?php echo $Status['PjCreat']; ?>
		<?php
		$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
		mysql_select_db($server_cdb_2, $connection_setup) or die(mysql_error());
		
		$char_sql = "SELECT COUNT(*) FROM characters";
		$sqlquery = mysql_query($char_sql) or die(mysql_error());
		$char = mysql_result($sqlquery,0,0);
 
        $char_online = "SELECT COUNT(*) FROM characters WHERE online = '1'";
		$sql_on = mysql_query($char_online) or die(mysql_error());
		$char_on = mysql_result($sql_on,0,0);
		?>
		<span class="date"><?php echo $char; ?></span>
       	</td><td align="left">
        <?php echo $Status['Drop']; ?><span class="date"><?php echo $DropServ_2; ?></span><br />
        </td></tr>
        <tr><td height="18">
        <?php echo $Status['PjConect']; ?><span class="date"><?php echo $char_on; ?></span><br />
        <td align="left">
        <?php echo $Status['Exp']; ?><span class="date"><?php echo $ExpServ_3; ?></span><br />
        </td>
        </tr></table>
		<span class="clear"><!-- --></span>
		<br />
		
		<center>
			<?php 
			$bar_width = "273px";
			$bar_height = "20px";
			$ally_img = "wow/static/images/services/status/ally.png";
			$horde_img = "wow/static/images/services/status/horde.png";
			//Show percent online (true = yes, false = no)
			$show_percent = true; 

			$alliance = array("1","3","4","7","11","22");
			$horde = array("2","5","6","8","9","10");

			$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
			if(!$connection_setup)
				die(CFAIL);
				
			function getPlayers2($server_cdb_2,$connection_setup) {
				$db = @mysql_select_db($server_cdb_2,$connection_setup);
				if(!$db) {
					die(DFAIL);
				}
				$query = @mysql_query("SELECT online FROM characters WHERE online = '1'");
				if(!$query) {
					die(QFAIL);
				}
				return @mysql_num_rows($query);
			}

			function doFaction2($server_cdb_2,$connection_setup,$a) {
				$db = @mysql_select_db($server_cdb_2,$connection_setup);
				if(!$db) {
					die(DFAIL);
				}
				$query = @mysql_query("SELECT race FROM characters WHERE online = '1'");
				if(!$query) {
					die(QFAIL);
				}
				$i = 0;
				while($r = @mysql_fetch_array($query)) {
					$race = $r['race'];
					if(in_array($race,$a)) {
						$i++;
					}
				}
				return $i;
			}

			function percent2($a,$t) {
				$count1 = $a / $t;
				$count2 = $count1 * 100;
				$count = number_format($count2, 0);
				return $count;
			}

			function barWidth2($a,$b,$t) {
				if(($a == 0) && ($b == 0)) {
					$count2 = "136.5";
				}
				else {
					$count1 = $a / $b;
					$count2 = $count1 * $t;
				}
				return $count2;
			}

			$p = @getPlayers($server_cdb_2,$connection_setup);
			$a = @doFaction($server_cdb_2,$connection_setup,$alliance);
			$h = @doFaction($server_cdb_2,$connection_setup,$horde);
			$ap = @percent($a,$p);
			$hp = @percent($h,$p);
			$b = @barWidth($a,$p,273);
			$c = @barWidth($h,$p,273);
			echo "<a data-tooltip='".doFaction($server_cdb_2,$connection_setup,$alliance)." <font style=\"color:#3399ff;font-weight:bold;\">".$Status['Ali']."</font> <small>".$Status['PlOnLine']."</small>'\><div style=\"width:" . $bar_width . ";height:" . $bar_height . ";\">
			<div style=\"float:left;text-align:right;background:url(./" . $ally_img . ");width:" . $b . "px;height:20px;\">";
			if($show_percent) {
				echo "<font style=\"color:#FFFFFF;font-weight:bold;\"><center>$ap%</center></font></a>";
			}
			echo "<a data-tooltip='".doFaction($server_cdb_2,$connection_setup,$horde)." <font style=\"color:#ff3333;font-weight:bold;\">".$Status['Horde']."</font> <small>".$Status['PlOnLine']."</small>'\></div>
			<div style=\"float:right;text-align:left;background:url(./" . $horde_img . ");background-position:right;width:" . $c . "px;height:20px;\">";
			if($show_percent) {
				echo "<font style=\"color:#FFFFFF;font-weight:bold;\"><center>$hp%</center></font></a>";
			}
			echo "</div>
			</div>";

			?>
		</center>
		</div>
	</div>
</div>