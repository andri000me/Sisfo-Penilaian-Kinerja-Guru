var _baseURL    = window.location.origin+'/';
var arr_kj      = [];
var arr_nj      = [];
var arr_pn      = [];
var arr_kd      = [];
var arr_st      = [];
var _infowindow = new google.maps.InfoWindow();
var _flightPath,map,marker;
function routesMap() {
     map = new google.maps.Map(document.getElementById('peta-route'), {
        center            : {lat: 0.552784, lng: 123.054532},
        zoom              : 13, 
        mapTypeId         : google.maps.MapTypeId.ROADMAP,
                            mapTypeControlOptions: {
                                style    : google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                                position : google.maps.ControlPosition.TOP_LEFT
                            },
        streetViewControl : false,
        panControl        : false,
        zoomControlOptions: {
                            style        : google.maps.ZoomControlStyle.SMALL,
                            position     : google.maps.ControlPosition.RIGHT_BOTTOM
                            }
    });
    marker = new google.maps.Marker({
      map       : map,
      draggable : false,
      position  : {
                  lat : 59.909144,
                  lng : 10.7436936
                  },
      icon      : {
                    path        : google.maps.SymbolPath.CIRCLE,
                    fillColor   : "#4285F4",
                    fillOpacity : 1,
                    scale       : 6,
                    strokeColor : "white",
                    strokeWeight: 2
                  }, // null = default icon
    }); 
     // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        }; 
         marker.setPosition(pos);
         marker.setTitle('Your position is '+position.coords.latitude+", "+position.coords.longitude);
         map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
       var watchID; 
       var options = {timeout:10000}; 
       watchID = navigator.geolocation.watchPosition(showLocation, errorHandler, options);
    }else{
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
    $.ajax({
        type     : "POST",
        url      : _baseURL + "data-jalur/maps/",
        data     : {"type" : 'active'},
        dataType : 'json',
        cache    : false,
        success  : function(json){
            for(i=0;i<json.length;i++){
                  arr_kj[i]   = json[i].kriteria_jalur;
                  arr_nj[i]   = json[i].nama_jalur;
                  arr_pn[i]   = json[i].plat_no;
                  arr_kd[i]   = json[i].kendaraan;
                  arr_st[i]   = json[i].status;
                  _flightPath = new google.maps.Polyline({
                                  path          : json[i].koordinat, 
                                  strokeColor   : json[i].warna,
                                  strokeOpacity : 1.0,
                                  strokeWeight  : 4
                                }); 
                  _flightPath.setMap(map);
                  _setInfo(_flightPath,i,map,_infowindow);
            }
        }
    });
}
function _setInfo(_flightPath, i, map, _infowindow){
    google.maps.event.addListener(_flightPath, 'click', function(event){
      _contentString = '<div align="left" style="font-family: "Product Sans",sans-serif;"><strong><span style="font-size:18px;">Deskripsi Jalur</span></strong>'+
                '<hr style="margin-top:3px;margin-bottom:3px;">'+
                '<table width="300px" style="width:350px;" border="0">'+
                  '<tbody>'+
                    '<tr>'+
                      '<td width="40%" height="20" valign="top"><strong>Kriteria Jalur</strong></td>'+
                      '<td width="2%" valign="top">:</td>'+
                      '<td align="left" valign="top" align="justify">'+arr_kj[i]+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td width="40%" height="20"valign="top"><strong>Nama Jalur</strong></td>'+
                      '<td width="2%" valign="top">:</td>'+
                      '<td align="left" valign="top" align="justify">'+arr_nj[i]+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td width="40%" height="20"valign="top"><strong>Plat No</strong></td>'+
                      '<td width="2%" valign="top">:</td>'+
                      '<td align="left" valign="top" align="justify">'+arr_pn[i]+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td width="40%" height="20"valign="top"><strong>Kendaraan</strong></td>'+
                      '<td width="2%" valign="top">:</td>'+
                      '<td align="left" valign="top" align="justify">'+arr_kd[i]+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td width="40%" height="20"valign="top"><strong>Status</strong></td>'+
                      '<td width="2%" valign="top">:</td>'+
                      '<td align="left" valign="top" align="justify">'+arr_st[i]+'</td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td colspan="3" width="100%"></td>'+
                    '</tr>'+
                  '</tbody>'+
              '</table>'+
              '</div>'; 
            _infowindow.setContent(_contentString);
            _infowindow.setPosition(event.latLng);
            _infowindow.open(map);
    });
}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  alert(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}
function showLocation(position) { 
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var pos = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    }; 
    marker.setPosition(pos);
    marker.setTitle('Your position is '+position.coords.latitude+", "+position.coords.longitude);
    map.setCenter(pos);
 }
 function errorHandler(err) {
    if(err.code == 1) {
       alert("Error: Access is denied!");
    } else if( err.code == 2) {
       alert("Error: Position is unavailable!");
    }
 }