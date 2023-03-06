


var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
  subdomains:['mt0','mt1','mt2','mt3']
});

var map = L.map(document.getElementById('map'), {
  center: [1.80054, -61.4714],
  zoom: 7,
  zoomControl: false,
  layers: [googleTerrain, limitesMunic, areaImo]
});



var coordDIV = document.createElement('div');
  coordDIV.id = 'mapCoordDIV';
  coordDIV.style.position = 'absolute';
  coordDIV.style.bottom = '2%';
  coordDIV.style.left = '45%';
  coordDIV.style.zIndex = '900';
  coordDIV.style.backgroundColor = '#fff';
  coordDIV.style.fontSize = '15px';
  coordDIV.style.width = '310px';
  coordDIV.style.textAlign = 'center';
  coordDIV.style.borderRadius = '7px';

document.getElementById('map').appendChild(coordDIV);


map.on('mousemove', function(e){
  var lat = e.latlng.lat.toFixed(6);
  var lon = e.latlng.lng.toFixed(6);
  document.getElementById('mapCoordDIV').innerHTML ='Latitude: ' + lat + ' / Longitude: ' + lon;
});

// Controlador do zoom

var zoom_bar = new L.Control.ZoomBar({position: 'topright'}).addTo(map);

// Barra de escala

var graphicScale = L.control.graphicScale({
position: 'bottomright',
doubleLine: false,
fill: 'fill',
    showSubunits: false
}).addTo(map);


