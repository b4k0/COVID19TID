// Custom JS

// $(document).ready(function(){
//     //Reset button
//     $("#btn_reset").on("click", function(){
//         $("#.poiTable").empty();
//     })
// });


var map = L.map('mapid').setView([38.246639, 21.734573], 12);

// var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// });
// osm.addTo(map);

// Google Maps Layer
var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3']});
googleStreets.addTo(map);

//checks for color of marker
for (var i=0; i<dataPOI.length; i++){
    if  (dataPOI[i].current_popularity <=32){
        var leafletImage = L.icon({
            iconUrl: 'green.png',
            iconSize: [30, 40],
            iconAnchor: [15, 40],
            popupAnchor: [0, -35]
        });
        function clickZoom(e) {
            map.setView(e.target.getLatLng(),17);
        }
        L.marker([dataPOI[i].lat,dataPOI[i].lng],{icon: leafletImage}).bindPopup("<b>"+ dataPOI[i].name  + "</b><br />Address: "+ dataPOI[i].address + "</b><br />Rating: " + dataPOI[i].rating + "</b><br />Popularity: " + dataPOI[i].current_popularity+"%").on('click', clickZoom).addTo(map);
    }else if (dataPOI[i].current_popularity > 32 && dataPOI[i].current_popularity <= 65) {
        var leafletImage = L.icon({
            iconUrl: 'orange.png',
            iconSize: [30, 40],
            iconAnchor: [15, 40],
            popupAnchor: [0, -35]
        });
        function clickZoom(e) {
            map.setView(e.target.getLatLng(),17);
        }
        L.marker([dataPOI[i].lat,dataPOI[i].lng],{icon: leafletImage}).bindPopup("<b>"+ dataPOI[i].name  + "</b><br />Address: "+ dataPOI[i].address + "</b><br />Rating: " + dataPOI[i].rating + "</b><br />Popularity: " + dataPOI[i].current_popularity+"%").on('click', clickZoom).addTo(map);
    }else if(dataPOI[i].current_popularity > 65 && dataPOI[i].current_popularity <= 100){
        var leafletImage = L.icon({
            iconUrl: 'red.png',
            iconSize: [30, 40],
            iconAnchor: [15, 40],
            popupAnchor: [0, -35]
        });
        function clickZoom(e) {
            map.setView(e.target.getLatLng(),17);
        }
        L.marker([dataPOI[i].lat,dataPOI[i].lng],{icon: leafletImage}).bindPopup("<b>"+ dataPOI[i].name  + "</b><br />Address: "+ dataPOI[i].address + "</b><br />Rating: " + dataPOI[i].rating + "</b><br />Popularity: " + dataPOI[i].current_popularity+"%").on('click', clickZoom).addTo(map);
     }
}