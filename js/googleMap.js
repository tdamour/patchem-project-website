// global variables 
var map; 
var infoWindow; 

/* array of objects - markersData */ 
var markersData = [
 {
	lat: 42.3390,
	lng: -83.0685, 
	name:'Motor City Casino', 
	address1:'2901 Grand River Ave',
	address2:'Detroit, MI', 
	zipcode:'48201'
 },
 {
	lat: 42.3252,
	lng: -83.0514, 
	name:'Joe Louis Arena', 
	address1:'19 Steve Yzerman Dr.',
	address2:'Detroit, MI', 
	zipcode:'48226'
 },
  {
	lat: 42.3400,
	lng: -83.0456, 
	name:'Ford Field', 
	address1:'2000 Brush St.',
	address2:'Detroit, MI', 
	zipcode:'48226'
  },
    {
	lat: 42.3418,
	lng: -83.0602, 
	name:'Detroit Masonic Temple', 
	address1:'500 Temple St.',
	address2:'Detroit, MI', 
	zipcode:'48201'
   },
    {
	lat: 42.3591,
	lng: -83.0665, 
	name:'Wayne State University', 
	address1:'42 W. Warren Ave',
	address2:'Detroit, MI', 
	zipcode:'48202'
  }
]; 

// this function will iterate over markersData array 
// creating markers with createMarker function 
function displayMarkers() {
	
	// this variable sets the map bounds and zoom level according 
	var bounds = new google.maps.LatLngBounds();
	
	// for loop that runs through the info on markersData making 
	for(var i=0; i< markersData.length;i++)
	{
		var latlng = new google.maps.LatLng(markersData[i].lat,markersData[i].lng);
		var name = markersData[i].name; 
		var address1 = markersData[i].address1; 
		var address2 = markersData[i].address2; 
		var zipcode = markersData[i].zipcode; 
		
		createMarker(latlng,name,address1,address2,zipcode); 
		
		// Marker's Lat. and Lng. values are added to bounds variable 
		bounds.extend(latlng); 
	}
	
	// bounds variable is used to set up map bounds with API's fitBounds() function
	map.fitBounds(bounds); 
}

// This function creates each marker and sets their Info Window content
function createMarker(latlng, name, address1, address2, postalCode){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name
   });

   // This event expects a click on a marker
   // When this event is fired the infowindow content is created
   // and the infowindow is opened
   google.maps.event.addListener(marker, 'click', function() {
      
      // Variable to define the HTML content to be inserted in the infowindow
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title">' + name + '</div>' +
      '<div class="iw_content">' + address1 + '<br />' +
      address2 + '<br />' +
      postalCode + '</div></div>';
      
      // including content to the infowindow
      infoWindow.setContent(iwContent);

      // opening the infowindow in the current map and at the current marker location
      infoWindow.open(map, marker);
   });
}

function init() {
 var mapOptions = {
  center:new google.maps.LatLng(42.3314, -83.0458),
  zoom: 14,
  mapTypeId: google.maps.MapTypeId.ROADMAP
};
	map=new google.maps.Map(document.getElementById("org_map"), map);
	
	// new infoWindow is created 
	infoWindow = new google.maps.InfoWindow(); 
	
	// event that closes the InfoWindow with a click on map 
	google.maps.event.addListener(map,'click',function(){
		infoWindow.close();
	}); 
	
	// displayMarkers() is called 
	displayMarkers(); 
}
google.maps.event.addDomListener(window, 'load', init);

/* Great Reference : http://en.marnoto.com/2013/12/mapa-com-varios-marcadores-google-maps.html */ 