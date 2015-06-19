$(document).ready(function() {

	/*
	
	*** DEPRECIATED: USED FOR OLD API ***
	
	$('#search-by-location').click(function () {
		var selected = $('#whale-by-parameter').val();
		// Replace spaces with '-' in the user's entry for the url API
		// WhalesController's json() method will switch it back to spaces to match the DB value
		selected = selected.split(' ').join('-');
		$.getJSON('json/location/' + selected, function(response) {
			console.log	(response);
		});
	});

	
	$('#search-by-species').click(function () {
		var selected = $('#whale-by-parameter').val();
		selected = selected.split(' ').join('-');	
		$.getJSON('json/species/' + selected, function(response) {
			console.log(response);
		});
	});
	
	*/
	function formatDate(isodate) {
		var date = new Date(isodate)
		var month = date.getMonth() + 1;
		var day = date.getDate();
		var year = date.getFullYear();
		var hours = date.getHours();
		var minutes = date.getMinutes();
		var ampm = hours >= 12 ? 'PM' : 'AM';

		hours = hours % 12;
		hours = hours ? hours : 12; // If hours == 0, hours = 12
		minutes = minutes < 10 ? '0'+minutes : minutes;
		var strTime = month + "/" + day + "/" + year + " " + hours + ":" + minutes + " " + ampm;

		return strTime;
	}
	
	$('#whale-search').click(function() {
		// Clear the table
		$('#whale_table').empty();

		var location = $('#location :selected').text();
		var species = $('#species :selected').text();
		// Replace spaces from the user's entry with '-' to pass into the url query string
		location = location.split(' ').join('-');
		species = species.split(' ').join('-');
		console.log(location);

		$.getJSON('json_query?location=' + location + "&species=" + species, function(response) {
			
			var jsonData = [];
			var trHTML = '';
			// Data comes back as [0: {Whale: {id: val1, location: val2, etc: val3}}, 1: {Whale {...}}]
			// Convert to JSON [{id: val1, location: val2, etcL: ...}, {id...}]
			for (var i = 0; i < response.length; i++) {
				jsonData.push(response[i].Whale);
			}
			// Iterate through the list of JSON objects and build the table rows
			for (i = 0; i < jsonData.length; i++) {
				trHTML += '<tr><td>' + formatDate(jsonData[i].observed) + '</td><td>' + jsonData[i].species + '</td><td>' + jsonData[i].location + '</td></tr>';
			}

			$('#whale_table').html(trHTML);

		});
	});

});