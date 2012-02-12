<?php

function realm_status($host, $port){
	error_reporting(0);
	$etat = fsockopen($host,$port,$errno,$errstr,3);
	if(!$etat) return false;
	else return true;
}

?>


<div id="sidebar-marketing" class="sidebar-module">
	<div class="sidebar-title">
		<h3 class="title-bnet-ads"><?php echo $Ind['Ind4']; ?>
			<?php
			if(realm_status($serveraddress, $serverport) === false)
				echo"<font color=red>Offline</font>";
			elseif(realm_status($serveraddress, $serverport) === true)
				echo "<font color=#00FF00>Online</font>";
			else
				echo "<font color=yellow>Unavailable</font>";
			?>
		</h3>
	</div>
	
	<span class="clear"><!-- --></span>
	
	<?php
	$sql = mysql_query ("SELECT * FROM $server_adb.`uptime` ORDER BY `starttime` DESC LIMIT 1");  
	$uptime_results = mysql_fetch_array($sql);    
	
	if($uptime_results['uptime'] > 2592000) $uptime =  round(($uptime_results['uptime'] / 30 / 24 / 60 / 60),2)." Months";
	elseif($uptime_results['uptime'] > 86400) $uptime =  round(($uptime_results['uptime'] / 24 / 60 / 60),2)." Days";
	elseif($uptime_results['uptime'] > 3600) $uptime =  round(($uptime_results['uptime'] / 60 / 60),2)." Hours";
	else $uptime =  round(($uptime_results['uptime'] / 60),2)." Min";
	
	echo "<font color='#00FF00'><b>Uptime :</b></font> <span class='date'>$uptime</span> <br>";
	?>
	
	<div class="sidebar-module" id="sidebar">
		<?php echo $Ind['Ind5']; ?><span class="date"><?php echo $website['realm']; ?></span><br />
		<?php echo $Ind['Ind6']; ?><span class="date"><font color='#FF0000'><?php echo $website['version']; ?></font></span><br />
		<?php echo $Ind['Ind7']; ?><span class="date">
		<?php
		mysql_select_db($server_adb, $connection_setup) or die(mysql_error());
		
		$acct_sql = "SELECT COUNT(*) FROM account";
		$acct_sqlquery = mysql_query($acct_sql) or die(mysql_error());
		$acc = mysql_result($acct_sqlquery,0,0);

		echo ("<font color='#FF0000'>$acc</font>");
		mysql_close($connection_setup);
		?>
		
		<?php echo $Ind['Ind8']; ?></span><br />
		<?php echo $name_realm1['realm']; ?><?php echo $Ind['Ind9']; ?><span class="date">
		<?php
		$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
		mysql_select_db($server_cdb, $connection_setup) or die(mysql_error());
		
		$char_sql = "SELECT COUNT(*) FROM characters";
		$sqlquery = mysql_query($char_sql) or die(mysql_error());
		$char = mysql_result($sqlquery,0,0);

		echo ("<font color='#FF0000'>$char</font>");
		mysql_close($connection_setup);
		?>
		
		<?php echo $Ind['Ind10']; ?></span><br />
		
		<span class="clear"><!-- --></span>
		<br/>
		
		<div class="sidebar-title">
			<h3 class="title-bnet-ads">
				<?php echo $name_realm1['realm']; ?> 
				<img src="wow\static\local-common\images\icons\employee.gif" width="20" height="14" align="right" style="margin-top:6px" />
			</h3>
		</div>
		
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

			define("QFAIL","Unable to run query.");
			define("CFAIL","Database connection failed! Check your settings!");
			define("DFAIL","Unable to select database.");

			$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
			if(!$connection_setup)
				die(CFAIL);
				
			function getPlayers($server_cdb,$connection_setup) {
				$db = @mysql_select_db($server_cdb,$connection_setup);
				if(!$db) {
					die(DFAIL);
				}
				$query = @mysql_query("SELECT online FROM characters WHERE online = '1'");
				if(!$query) {
					die(QFAIL);
				}
				return @mysql_num_rows($query);
			}

			function doFaction($server_cdb,$connection_setup,$a) {
				$db = @mysql_select_db($server_cdb,$connection_setup);
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

			function percent($a,$t) {
				$count1 = $a / $t;
				$count2 = $count1 * 100;
				$count = number_format($count2, 0);
				return $count;
			}

			function barWidth($a,$b,$t) {
				if(($a == 0) && ($b == 0)) {
					$count2 = "136.5";
				}
				else {
					$count1 = $a / $b;
					$count2 = $count1 * $t;
				}
				return $count2;
			}

			$p = @getPlayers($server_cdb,$connection_setup);
			$a = @doFaction($server_cdb,$connection_setup,$alliance);
			$h = @doFaction($server_cdb,$connection_setup,$horde);
			$ap = @percent($a,$p);
			$hp = @percent($h,$p);
			$b = @barWidth($a,$p,273);
			$c = @barWidth($h,$p,273);
			echo "<a data-tooltip='".doFaction($server_cdb,$connection_setup,$alliance)." <font style=\"color:#3399ff;font-weight:bold;\">alliance</font> <small>players Online.</small>'\><div style=\"width:" . $bar_width . ";height:" . $bar_height . ";\">
			<div style=\"float:left;text-align:right;background:url(./" . $ally_img . ");width:" . $b . "px;height:20px;\">";
			if($show_percent) {
				echo "<font style=\"color:#FFFFFF;font-weight:bold;\"><center>$ap%</center></font></a>";
			}
			echo "<a data-tooltip='".doFaction($server_cdb,$connection_setup,$horde)." <font style=\"color:#ff3333;font-weight:bold;\">horde</font> <small>players Online.</small>'\></div>
			<div style=\"float:right;text-align:left;background:url(./" . $horde_img . ");background-position:right;width:" . $c . "px;height:20px;\">";
			if($show_percent) {
				echo "<font style=\"color:#FFFFFF;font-weight:bold;\"><center>$hp%</center></font></a>";
			}
			echo "</div>
			</div>";

			?>
		</center>
		
		<br>
	</div>
</div>