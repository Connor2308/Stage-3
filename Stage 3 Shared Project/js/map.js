let map;

async function initMap(){
    const position = {lat: 24.86, lng: 29.19 };
    
    const{Map} = await google.maps.importLibary("maps");
    const{AdvancedMarkerElement} = await google.maps.importLibary("marker");

    map = new Map (document.getElementById("maps"),{
        zoom: 4,
        center: position,
        mapId: "Demo_Map_ID", 
    });

    const marker = new AdvancedMarkerElement({
        map: map,
        position: position,
        title: "Malaysia Hotels",

    });

}
function search() {
    var searchText = document.getElementById('searchInput').value;
    searchHotelsHomestays(searchText);
}

function searchHotelsHomestays(query) {
    alert('Searching for: ' + query);
}

initMap();