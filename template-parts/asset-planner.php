<?php
/* Trip planner */
?>

<div id="trip_planner">

<h2>Plan Your Trip</h2>


<form name="f" action="https://jump.trilliumtransit.com/redirect.php" role="form">
	<input type="hidden" name="ie" value="UTF8"/>
	<input type="hidden" name="f" value="d"/>
	<input type="hidden" value="194" name="agency"/>
    <table>
		<caption class="screen-reader-text">Trip Planner</caption>
			<thead>
				<tr class="minimized-visible">
					<td valign="top">
						<label for="saddr" class="min-hide">Start</label>
						<input type="text" name="saddr" maxlength="2048" id="saddr" placeholder="Enter your start location"/>
						<span class="min-hide"><font size="-2">e.g. 1801 Panorama Dr, Bakersfield, CA</font></span>
					</td>
				</tr>	
			</thead>
			<tbody>
				<tr class="min-hide">
					<td>
						<label for="daddr">End</label>
						<input type="text" placeholder="Enter your destination" name="daddr" id="daddr" maxlength="2048"/>
						<input type="hidden" name="sll" value="35.372915,-119.018819" />
						<font size="-2">e.g. Lake Isabella Public Library</font>
					</td>
				</tr> 
				<tr class="min-hide">
					<td>	
						<label for="leave">Depart at</label>
						<input type="radio" id="leave" name="ttype" value="dep" checked="checked"/>
							<span>or </span>
						<label for="arrive">Arrive by</label>
						<input type="radio" id="arrive" name="ttype" value="arr" tabindex="0"/>
						</td>
					</tr>
					<tr class="min-hide">
						<td>
							<font size="-1">
								<label for="fdate" class="screen-reader-text">Date</label>
								<input type="text" id="fdate" size="10" name="date" value="" maxlength="100"/>
								<label for="ftime" class="screen-reader-text">Time</label> 
								<input type="text" id="ftime" size="10" name="time" value="" maxlength="100"/>
							</font>
						</td>
					</tr>
					<tr class="min-hide">
						<td valign="top">
							<input type="submit" value="Get Directions"/>
						</td>
					</tr>
					<tr>
						<td>
							<span id="planner-terms" class="min-hide">
								Read <a href="https://kerntransit.org/trip_planner/">info and terms &amp; conditions</a>.  Trip planning is provided using <a href="https://www.google.com/transit">Google Maps</a>.
							</span>
						</td>
					</tr>
			</tbody>
	</table>
</form>



</div>

