

L.mapbox.accessToken = 'pk.eyJ1IjoidHJpbGxpdW10cmFuc2l0IiwiYSI6ImVUQ2x0blUifQ.2-Z9TGHmyjRzy5GC1J9BTw';
var map = L.mapbox.map('map', 'trilliumtransit.j3p18nh0', {touchZoom:false, scrollWheelZoom:false})
.addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11')); // New line that fixes the missing styles 5.4.2021


        // set map styles
        // var dashes = '8, 12';

        var default_style = {
            fill: true,
            clickable: true,
            fillOpacity: 0.5,
            weight:5,
            pointerEvents: null
            // dashArray: dashes
            };

        
        // is this necessary
        map._layersMinZoom=map.getZoom();

        
        
        // set up load data function
        // borrowed from stackoverflow.com/questions/2177548/load-json-into-variable
        function load_data(url, dataType, async) {
            dataType = typeof dataType !== 'undefined' ? dataType : "json";
            async = typeof async !== 'undefined' ? async : false;

            var returned_data = null;
            $.ajax({
                'async': async,
                'global': false,
                'url': url,
                'dataType': dataType,
                'success': function (data) {
                    returned_data = data;
                }
            });
            return returned_data;
        }
        

var base_json_url = '/wp-content/transit-data/dar-json/';
var base_dar_info_url = '/dial-a-ride/';

var dar_areas_array = new Array(

new Array("Mojave Dial-A-Ride", "East Kern", "Monday thru Saturday", "7:00 AM to 6:00 PM", "dial-mojave", "e0871a", "dial-mojave.json",""),
new Array("Rosamond Dial-A-Ride", "East Kern", "Monday thru Saturday", "6:30 AM to 5:30 PM", "dial-rosamond", "e0871b", "dial-rosamond.json",""),
new Array("Tehachapi Dial-A-Ride", "East Kern", "Monday thru Saturday", "5:45 AM to 7:00 PM (Monday-Friday)\r7:30 AM to 5:30 PM (Saturday)", "dial-tehachapi", "e0871c", "dial-tehachapi.json",""),
new Array("Frazier Park Dial-A-Ride", "Frazier Park", "Monday thru Saturday", "7:15 AM to 5:15 PM", "dial-frazier-park", "25639e", "dial-frazier-park.json","Cuddy Valley, Pinon Pines, Gorman, Lake of the Woods, Lebec, Frazier Park"),
new Array("Kern River Valley Dial-A-Ride", "Kern River Valley", "Monday thru Saturday", "6:30 AM to 6:30 PM (Monday thru Friday)\r7:45 AM to 6:30 PM (Saturday)", "dial-kern-river-valley", "ed1846", "dial-kern-river-valley.json","Onyx, Riverkern/Kernville North, Kelso Valley, Hillview Acres, Southlake, Mountain Mesa, Bodfish, Lake Isabella, Wofford Heights"),
new Array("Lamont Dial-A-Ride", "Lamont Area", "Monday thru Sunday", "4:30 AM to 7:00 PM (Monday thru Friday)\r5:30 AM to 7:00 PM (Saturday)\r7:00 AM to 8:00 PM (Sunday)", "dial-lamont", "570961", "dial-lamont.json",""),
new Array("Lost Hills Dial-A-Ride", "North Kern", "Thursday and Saturday Only", "No hours provided - requires prior day reservation", "dial-lost-hills", "7c51a1", "dial-lost-hills.json","")

);

var dar_geojson = new Array();
var dar_styles = new Array();
var dar_areas_group = new L.FeatureGroup();


var dar_areas_arrayLength = dar_areas_array.length;
for (var i = 0; i < dar_areas_arrayLength; i++) {
    
    dar_styles[i] = $.extend({}, default_style); // Make a simple clone (jQuery)
    dar_styles[i].color = '#'+dar_areas_array[i][5];
    dar_styles[i].fillColor = '#'+dar_areas_array[i][5];
    
    dar_geojson[i] = L.geoJson(load_data(base_json_url + dar_areas_array[i][6]), 
                                {style: dar_styles[i], dar_url: base_dar_info_url + dar_areas_array[i][4], 
                                onEachFeature: function(feature, layer) { 
                                                            layer.on('click', function(e) { window.location.href = this.options.dar_url; }); } 
                                                            }).addTo(map);
    dar_areas_group.addLayer(dar_geojson[i]); 
    }
        
    map.fitBounds(dar_areas_group.getBounds());

    


    function highlight_dar(dar_id) {
    
    var highlight_style = {
        color: '#'+dar_areas_array[dar_id][5],
        fillColor: '#'+dar_areas_array[dar_id][5],
        fill: true,
        fillOpacity: 0.7,
        weight:20
        };
    
    dar_geojson[dar_id].setStyle(highlight_style);
    }
    
    function unhighlight_dar(dar_id) {
    
    dar_geojson[dar_id].setStyle(dar_styles[dar_id]);
    }
    
    /*function goToDarPage(dar_id) {
    
        var shared_class = explode('.',dar_areas_array[dar_id][6])[0];
        window.location.href = '<?php echo get_site_url(); ?>/dial-a-ride/'.+shared_class;
    
    }*/
    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        
        /*if (feature.properties) {
            layer.on("click", function() {
                    myClick(feature)
            })
            };*/
    }
    
    
    function myClick(e) {
        
        
            alert(Object.keys(e));
    }



    
