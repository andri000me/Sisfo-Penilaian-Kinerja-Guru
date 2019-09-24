function initMap(){
    var goo             = google.maps,
        map_in          = new google.maps.Map(document.getElementById('add_polygon'),
                          { 
                            zoom                  : 10, 
                            center                : new google.maps.LatLng(0.552784,123.054532),
                            zoomControl           : true,
                            streetViewControl     : false,
                            panControl            : false,
                            zoomControlOptions    : {
                                                      style    : google.maps.ZoomControlStyle.SMALL,
                                                      position : google.maps.ControlPosition.RIGHT_BOTTOM
                                                    },
                            mapTypeControlOptions : {
                                                      style    : google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                                                      position : google.maps.ControlPosition.TOP_LEFT
                            },
                          }),
        shapes          = [],
        selected_shape  = null,
        lineSymbol      = {
                            path: 'M 1.5 1 L 1 0 L 1 2 M 0.5 1 L 1 0',
                            fillColor: 'black',
                            strokeColor: 'black',
                            strokeWeight: 2,
                            strokeOpacity: 1
                          },
        drawman         = new google.maps.drawing.DrawingManager
                          ({
            								map                   : map_in,
            								drawingControl        : true,
            								drawingControlOptions : {
            								  position            : google.maps.ControlPosition.TOP_CENTER,
            								  drawingModes        : [ 
                                                     google.maps.drawing.OverlayType.POLYGON,
                                  								  ]
            								},
                            polygonOptions        : {
                                                      editable      : true,
                                                      fillColor     : '#1E90FF',
                                                      fillOpacity   : 0.45,
                                                      strokeColor   : '#1E90FF',
                                                      strokeOpacity : 0.8,
                                                      strokeWeight  : 2,
                                                      icons         : [{
                                                                        icon   : lineSymbol,
                                                                        offset : '25px',
                                                                        repeat : '100px'
                                                                      }]
                                                    }
            							}),
        byId            = function(s){
                              return document.getElementById(s);
                          },
        clearSelection  = function(){
                            if(selected_shape){
                              selected_shape.set((selected_shape.type === google.maps.drawing.OverlayType.MARKER) ? 'draggable' : 'editable',false);
                              selected_shape = null;
                            }
                          },
        setSelection    = function(shape){
                              selected_shape = shape;
                              selected_shape.set((selected_shape.type === google.maps.drawing.OverlayType.MARKER) ? 'draggable' : 'editable',true);
                          },
        clearShapes     = function(){
                            for(var i=0;i<shapes.length;++i){
                              shapes[i].setMap(null);
                            }
                            shapes=[];
                            byId('koordinat').value="";
                          };

    google.maps.event.addListener(drawman, 'overlaycomplete', function(e) {
        var shape   = e.overlay;
        shape.type  = e.type;
        google.maps.event.addListener(shape, 'click', function() {
          setSelection(this);
        });
        setSelection(shape);
        shapes.push(shape);
      });
    google.maps.event.addListener(map_in, 'click',clearSelection);
    google.maps.event.addDomListener(byId('clear'), 'click', clearShapes);
    google.maps.event.addDomListener(byId('save'), 'click', function(){
        var arr     = shapes, 
            encoded = false,
            getLatlng,shape;
        for(var i = 0; i < arr.length; i++)
          {   
            shape     = arr[i];
            getLatlng = shape.getPath();
            path      = (getLatlng.getArray)?getLatlng.getArray():getLatlng;
              if(encoded){
                return google.maps.geometry.encoding.encodePath(path);
              }else{
                var n= '';
                for(var x=0;x<path.length;++x){ 
                  n +=  path[x].lat()+","+path[x].lng()+" ";
                }
                $("#koordinat").val(n);
              }
        }
	  });    
}


