﻿<!DOCTYPE html>
<html>
<head>
    <title>Google Map GPS Cell Phone Tracker</title>
    <meta charset="utf-8">
	
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=adsense"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="javascript/maps.js"></script>
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
  	//<![CDATA[
        var routeSelect;
        var refreshSelect;
        var messages;
        var map;
        var intervalID;
        var newInterval;
        var currentInterval;
        var zoomLevelSelect;
        var zoomLevel;

		function load() {
		    // the code to process the data is in the /javascript/maps.js file

		    routeSelect = document.getElementById('selectRoute');
		    refreshSelect = document.getElementById('selectRefresh');
		    zoomLevelSelect = document.getElementById('selectZoomLevel');
     	    messages = document.getElementById('messages');
		    map = document.getElementById('map');

            intervalID = 0;
            newInterval = 0;
            currentInterval = 0;
            zoomLevel = 12;

	        zoomLevelSelect.selectedIndex = 11;
			refreshSelect.selectedIndex = 0;
		    showWait('Loading routes...');
			var i = 0;

		    // when the page first loads, get the routes from the DB and load them into the dropdown box.			
		    $.ajax({
		           url: 'getroutes.php',
		           type: 'GET',
		           dataType: 'xml',
		           success: function(data) {
		              loadRoutes(data);
		           }
		       });
		}
	 //]]>
     </script>

</head>
<body  onload="load()">    
    <div id="messages">GpsTracker</div>
    <div id="map"></div>

	<select id="selectRoute" onchange="getRouteForMap();" tabindex="1"></select>

	<select id="selectRefresh" onchange="autoRefresh();" tabindex="2">
        <option value ="0">Auto Refresh - Off</option>
        <option value ="60">Auto Refresh - 1 minute</option>
        <option value ="120">Auto Refresh - 2 minutes</option>
        <option value ="180">Auto Refresh - 3 minutes</option>
        <option value ="300">Auto Refresh - 5 minutes</option>
        <option value ="600">Auto Refresh - 10 minutes</option>
    </select>

	<select id="selectZoomLevel" onchange="changeZoomLevel();" tabindex="3">
        <option value ="1">Zoom Level - 1</option>
        <option value ="2">Zoom Level - 2</option>
        <option value ="3">Zoom Level - 3</option>
        <option value ="4">Zoom Level - 4</option>
        <option value ="5">Zoom Level - 5</option>
        <option value ="6">Zoom Level - 6</option>
        <option value ="7">Zoom Level - 7</option>
        <option value ="8">Zoom Level - 8</option>
        <option value ="9">Zoom Level - 9</option>
        <option value ="10">Zoom Level - 10</option>
        <option value ="11">Zoom Level - 11</option>
        <option value ="12">Zoom Level - 12</option>
        <option value ="13">Zoom Level - 13</option>
        <option value ="14">Zoom Level - 14</option>
        <option value ="15">Zoom Level - 15</option>
        <option value ="16">Zoom Level - 16</option>
        <option value ="17">Zoom Level - 17</option>
    </select>

	<input type="button" id="delete" value="Delete" onclick="deleteRoute()" tabindex="4">
	<input type="button" id="refresh" value="Refresh" onclick="getRouteForMap()" tabindex="5">

	 <div id="test"><p>Please note that phoneNumber (ie. androidUser) and sessionID are being displayed in the dropdown box below the map. <strong>You can change "androidUser" to anything you want</strong>. It will make it easier to identify your route during testing.</p>
	&nbsp;<br>
<p>It's line 148 in GpsTrackerActivity.java of the Android Studio project. This is the line:<br>
	&nbsp;<br>
 requestParams.put("phonenumber", "<strong>androidUser</strong>");<br>
&nbsp;<br>
change it to:
&nbsp;<br>
&nbsp;<br>
requestParams.put("phonenumber", "<strong>anythingElse</strong>");<br>
&nbsp;<br>
please. :o)
</p>		 	 
	 </div>
</body>
</html>





