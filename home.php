<style type="text/css">
  .gm-style-iw {color: #000000;margin: 0 0 0 0}
  .gmnoprint div {color: #000000;}
</style>
<script type="text/javascript">
    function initMap() {
      var map;
      var styleGMaps = [
	    {
    "featureType": "road.local",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "on" },
      { "invert_lightness": true },
	  { "gamma": 1.96 },
      { "lightness": -35 },
	  { "saturation": 25 },
      { "color": "#ffffff" },
      { "hue": "#00e5ff" }

    ]
  },{
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      { "invert_lightness": true },
      { "lightness": 33 },
      { "gamma": 0.84 },
      { "hue": "#0008ff" },
      { "visibility": "on" },
      { "saturation": 38 },
      { "weight": 2.2 },
      { "color": "#4f90f4" }
    ]
  },{
    "featureType": "road.arterial",
    "elementType": "geometry.fill",
    "stylers": [
      { "visibility": "on" },
      { "invert_lightness": true },
      { "color": "#ffb147" },
      { "saturation": 23 },
      { "hue": "#ff9100" },
      { "lightness": -30 },

      { "weight": 2.1 }
    ]
  },{
    "featureType": "landscape.natural",
    "elementType": "geometry.fill",
    "stylers": [
      { "visibility": "on" },
      { "lightness": -14 },
      { "color": "#5cae8e" },
      { "weight": 0.4 },
      { "saturation": 34 },
      { "gamma": 1.42 }
    ]
  }
];

      var styled = new google.maps.StyledMapType(styleGMaps,
        {name: "Styled Map"});


      var mapOptions = {
          center: {lat: -6.7445719, lng: 108.5615914}, 
          zoom:12,
          mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
          },
          mapTypeControl: false,
          zoomControl: false,
          scaleControl: false,
          streetViewControl: false,
          rotateControl: false,
          fullscreenControl: false
        };


      var mapAwal = {
          center: {lat: -6.7445719, lng: 101.4437629},
          zoom: 12 ,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById('map'),mapOptions);
      map.mapTypes.set('map_style', styled);
      map.setMapTypeId('map_style');
      var infoWindow = new google.maps.InfoWindow;
      downloadUrl("koordinat.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var latitude = parseFloat(markers[i].getAttribute("b"));
          var longitude = parseFloat(markers[i].getAttribute("c"));
          var keterangan = markers[i].getAttribute("d");
          var kategori = markers[i].getAttribute("e");
          var icon = 'assets/images/'+kategori+'.png' || {};
          var marker = new google.maps.Marker({
            map: map,
            position: {lat:latitude,lng:longitude},
            icon: icon,
          });
          bindInfoWindow(marker, map, infoWindow, keterangan);
        }
      });
    }


    function bindInfoWindow(marker, map, infoWindow, keterangan) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(keterangan);
        infoWindow.open(map, marker);
      });
    }


    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;


      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };


      request.open('GET', url, true);
      request.send(null);
    }


    function doNothing() {}
</script>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <center><h4>LOKASI WISATA HOTEL DAN KULINER DI KOTA CIREBON</h4></center>
        </div>
        <div class="panel-body">
        <a href="index.php?page=kelola" class="btn btn-warning">Halaman Kelola</a><button class="btn btn-danger" onclick="location.reload()">Refresh Maps</button></br>
        </br>
          <div id="map" style="width:100%;height:450px" ></div>
        </div>
    </div>
  </div>
</div>