<?php
/* Trip planner */
?>

<div id="trip_planner">

<h2>Plan Your Trip</h2>


<form name="f" action="https://jump.trilliumtransit.com/redirect.php">
	<input type="hidden" name="ie" value="UTF8"/>
	<input type="hidden" name="f" value="d"/>
	<input type="hidden" value="194" name="agency"/>
    <table>
        <tr class="min-hide">
            <td style="font-size:14px;" class="planner-title"><strong>Start</strong></td>
 		</tr>
 
		 <tr class="minimized-visible">
            <td valign="top">
				<input  type="text" alt="Start address"  name="saddr" maxlength="2048" id="saddr" placeholder="Enter your start location"/>
            	<span class="min-hide"><font size="-2">e.g. 1801 Panorama Dr, Bakersfield, CA</font></span>
			</td>
		</tr>

		<tr class="min-hide">
			<td style="font-size:14px;" class="planner-title" ><strong>End</strong>&nbsp;&nbsp;</td>
		</tr>
		<tr class="min-hide">
			<td>
				<input  type="text" alt="Destination address" placeholder="Enter your destination" name="daddr" id="daddr" maxlength="2048"/>
				<input type="hidden" name="sll" value="35.372915,-119.018819" />
				<font size="-2">e.g. Lake Isabella Public Library</font>
			</td>
		</tr> 


		<tr class="min-hide">
			<td>
				<font size="-1"><input type="radio" id="leave" alt="Leave at" name="ttype" value="dep" checked="checked"/><label for="leave">Depart at</label> &nbsp;or <input type="radio" alt="Arrive by at" id="arrive" name="ttype" value="arr" tabindex="1"/><label for="arrive">Arrive by</label></font></td></tr>
		<tr class="min-hide">
			<td>
				<font size="-1">
					<input type="text" alt="Date" id="fdate" size="10" name="date" value="" maxlength="100"/>  
					<input type="text" id="ftime" alt="Time" size="10" name="time" value="" maxlength="100"/>
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
				<span style="font-size:10px;" class="min-hide">
					Read <a href="https://kerntransit.org/trip_planner/">info and terms &amp; conditions</a>.  Trip planning is provided using <a href="https://www.google.com/transit">Google Maps</a>.
				</span>
			</td>
		</tr>
	</table>




</form>



</div>

