<div id="sidebar-marketing" class="sidebar-module">
	<div class="bnet-offer">
		<div class="sidebar-title">
			<h3 class="title-bnet-ads">
				Vote Panel
			</h3>
		</div>
		
		<div class="sidebar-content">
			<div class="sidebar-events">
				<h4>Vote Links</h4>

				<ul class="sidebar-list today">
					<?php
						$votes = mysql_query("SELECT * FROM $server_db.vote ORDER BY `id` ASC");
						while($vote = mysql_fetch_array($votes))
						{
							
							$votedx = mysql_query("SELECT * FROM $server_db.votes WHERE voteid = '".$vote['ID']."' AND userid = '".$account_information['id']."'");
							if(mysql_num_rows($votedx) > 0)
							{
								require_once("functions/custom.php");
								
								$voted = mysql_fetch_assoc($votedx);
								$last_vote = $voted['date'];
								$whenIcanvote = strtotime($last_vote) + (12*60*60);
								
								if(time() >= $whenIcanvote) $voteable = 1;
								else
								{
								$mYear = date('Y', $whenIcanvote);
								$mMonth = date('m', $whenIcanvote);
								$mDay = date('d', $whenIcanvote);
								$mHour = date('H', $whenIcanvote);
								$mMinute = date('i', $whenIcanvote);
								$mSecond = date('s', $whenIcanvote);
								$target = mktime($mHour, $mMinute, $mSecond, $mMonth, $mDay, $mYear) ;
								$today = time();
								$difference = ($target-$today);
								$in_time = (int)($difference/3600);
								if($in_time == 0) $in_time = "in a few"; else $in_time .= " hours";
								$voteable = 0;
								}
								
								
							}
							else $voteable = 1;
							
							echo'					
							<li class="event-summary sidebar-tile system-event">
								<a href="#" rel="np">
									<span class="icon-frame ">
										<img src="http://eu.battle.net/wow-assets/static/images/calendar/ui-calendar-event-pvp02start.png" alt="" width="27" height="27" />
										<span class="frame"></span>
									</span>

									<span class="info-wrapper clear-after">
										<span class="date date-status">'.date('H:i:s d/m',$whenIcanvote).'</span>
										<span class="title">'.$vote['Name'].'</span>';
										if($voteable == 1) echo '<span class="date">You can vote now</span>';
										else echo '<span class="date">You can vote in '.$in_time.'</span>';
										echo'
									</span>
									
									<span class="clear"><!-- --></span>
								</a>
								<span class="clear"><!-- --></span>
							</li>
							';
						}
					?>
				</ul>
			</div>
			
			<span class="clear"><!-- --></span>
			
			<ul class="sidebar-list">
				<li>
					<span class="float-right">
						<span class="icon-gold">0 VP</span>
					</span>
					Earned
				</li>
			</ul>
	
		</div>
	</div>
</div>