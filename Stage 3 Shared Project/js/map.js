//https://developers.google.com/maps/documentation/javascript/marker-clustering?_gl=1*17b6z7x*_up*MQ..*_ga*MzgyNDQxNDM5LjE3MTI5MzM3NDU.*_ga_NRWSTWS78N*MTcxMjkzMzc0NC4xLjAuMTcxMjkzMzc0NC4wLjAuMA..#maps_marker_clustering-javascript
//link above is a reference to the doccumentation that was used for developing this tool
//https://openweathermap.org/current#data
//here is the doccumentation for developing the weather system

let map;
let markers = [];

async function getWeatherInfo(lat, lon) { // of the current lat and long when this function is called
  const apiKey = '06b3136375c0542ee73504cb381787b0'; //apis key
  const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;
  
  //we use try and catch for error handling just incase some invalid data is entered
  try {
      const response = await fetch(apiUrl); //fetching weather data from the api for them coords
      const data = await response.json(); 
      return data; //returning data as the result of the function
  } catch (error) {
      console.error('Error fetching weather data:', error);
      return null; //herror handling
  }
}

async function initMap() {
  // Request needed libraries.
  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");
  // The location of malaysia for centering 
  const malaysiaPosition = { lat: 5.903295974014964, lng: 100.39410459400102 };
  // The map, centered at malaysia
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: malaysiaPosition,
    mapId: "DEMO_MAP_ID",
  });
  const infoWindow = new google.maps.InfoWindow({
    content: "",
    disableAutoPan: true,
  });

  //getting rid of null hotel locations so it does not break
  const validHotels = hotelData.filter(hotel => hotel.lat !== null && hotel.lng !== null);
  
  //adding the markers to the map
  validHotels.forEach(hotel=>{
    const marker = new google.maps.Marker({
      position: {lat: hotel.lat, lng: hotel.lng },
      label: {
        text: hotel.name,
        color: "black",
        fontSize: "18px",
      },
      map: map,
      
    });
    marker.addListener("click", async () => { //activates when the marker is clicked
      const weatherData = await getWeatherInfo(hotel.lat, hotel.lng); // call the function from the top by putting the markers lat and long in
      if (weatherData) {
        const temperatureCelsius = weatherData.main.temp;
        const weatherInfo = `Hotel ID: ${hotel.hotelId}<br></br>Weather: ${weatherData.weather[0].description}, Temperature: ${temperatureCelsius.toFixed(2)}°C,`;
        infoWindow.setContent(weatherInfo); //setting the content of the pop up window to the weather and temp
      } else {
        infoWindow.setContent('Failed to fetch weather data');
      }
      infoWindow.open(map, marker);
    });
    markers.push(marker);
  });
  const MarkerClusterer = new markerClusterer.MarkerClusterer({ markers, map })
}
initMap();