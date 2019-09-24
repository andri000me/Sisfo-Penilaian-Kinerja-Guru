var nama_dapil = [];
var warna      = [];
var koordinat  = []; 
var luas       = []; 
var cords      = [];
var _baseURL   = window.location.origin+'/';
var i,_maps,_infowindow,_center,_mapsOption,_contentString,_polygon;
function initMap(type,id){ 
    _center = new google.maps.LatLng(0.552784,123.054532);
    _mapsOption = {
            zoom: 13,
            center: _center,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.TOP_LEFT
                },
            streetViewControl: false,
            panControl: false,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_TOP
            },
     };
    _maps        = new google.maps.Map(document.getElementById("view-draw"),_mapsOption);
    _infowindow  = new google.maps.InfoWindow();
    _getPolygon(type,id);
}
function _getPolygon(type,id) {
    $.ajax({
        type    : "POST",
        url     : _baseURL + "data-dapil/maps/",
        data    : {"type" : type, 'id' : id, 'csrf-token' : $('meta[name="csrf_token"]').attr('content') },
        dataType: "json",
        success : function(json){
           if(json.length > 0){
              for(i=0;i<json.length;i++){
                    nama_dapil[i]  = json[i].nama_dapil;
                    warna[i]       = json[i].warna;
                    koordinat[i]   = json[i].koordinat;
                    luas[i]        = json[i].luas;
                    var str        = koordinat[i].split(" "); 
                    for (j=0; j < str.length; j++) { 
                        var point = str[j].split(",");
                        cords.push(new google.maps.LatLng(parseFloat(point[0]), parseFloat(point[1])));
                    }
                    _contentString = '<div align="left" style="font-family: "Product Sans",sans-serif;"><strong><span style="font-size:18px;">Informasi</span><br>'+
                                        '<hr style="margin-top:3px;margin-bottom:3px;">'+
                                        '<table width="300px" style="width:350px;" border="0">'+
                                        '<tbody>'+
                                            '<tr>'+
                                                '<td width="40%" valign="top"> <strong>Nama Dapil</strong></td>'+
                                                '<td width="2%" valign="top">:</td>'+
                                                '<td align="left"  valign="top">'+nama_dapil[i]+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td width="40%" valign="top"><strong>Luas</strong></td>'+
                                                '<td width="2%" valign="top">:</td>'+
                                                '<td align="left" valign="top" align="justify">'+luas[i]+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                            '<td colspan="3" width="100%"></td>'+
                                            '</tr>'+
                                        '</tbody>'+
                                    '</table>'+
                                    '</div>'; 
                    _polygon = new google.maps.Polygon({
                        paths: [cords],
                        strokeColor: json[i].warna,
                        strokeOpacity: 0,
                        strokeWeight: 1,
                        fillColor: json[i].warna,
                        fillOpacity: 0.5,
                        html: _contentString
                    });
                    cords = [];
                    _polygon.setMap(_maps); 
                    google.maps.event.addListener(_polygon, 'click', function(event) {
                        _infowindow.setContent(this.html);
                        _infowindow.setPosition(event.latLng);
                        _infowindow.open(_maps);
                    });
              }
           }else{
                alert('Sebaran lokasi tidak dapat ditampilkan');
           }
        }
    }); 
}
