

function initialize() {

    var defaultBounds = new google.maps.LatLngBounds(
     new google.maps.LatLng(35.372915,-119.018819));

    var origin_input = document.getElementById('saddr');
    var destination_input = document.getElementById('daddr');


    var options = {
     bounds: defaultBounds,
     componentRestrictions: {country: 'us'}
    };


    var autocomplete_origin = new google.maps.places.Autocomplete(origin_input, options);
    var autocomplete_destination = new google.maps.places.Autocomplete(destination_input, options);
    }

    
    function plannerSetup() {
		flatpickr("#fdate", {
			defaultDate: 'today',
			dateFormat: 'm/d/Y'
		});
		flatpickr("#ftime", {
			enableTime: true,
			noCalendar: true,
			dateFormat: "h:i K",
		}).setDate(new Date(), false, 'h:i K');
	}

	plannerSetup();

    google.maps.event.addDomListener(window, 'load', initialize);
  
