//https://developers.google.com/maps/documentation/javascript/marker-clustering?_gl=1*17b6z7x*_up*MQ..*_ga*MzgyNDQxNDM5LjE3MTI5MzM3NDU.*_ga_NRWSTWS78N*MTcxMjkzMzc0NC4xLjAuMTcxMjkzMzc0NC4wLjAuMA..#maps_marker_clustering-javascript
//link above is a reference to the doccumentation that was used for developing this tool
//https://openweathermap.org/current#data
//here is the doccumentation for developing the weather system

let map;
let markers = [];

async function getWeatherInfo(lat, lon) { // of the current lat and long when this function is called
  const apiKey = '06b3136375c0542ee73504cb381787b0'; //api key 
  const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;
  
  //try and catch for error handling just incase some invalid data is entered
  try {
      const response = await fetch(apiUrl); //fetching weather data from the api for them coords
      const data = await response.json(); 
      return data; //returning data as the result of the function
  } catch (error) {
      console.error('Error fetching weather data:', error);
      return null; //error handling
  }
}

async function initMap() {
  //request needed libraries.
  const { Map, InfoWindow } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement} = await google.maps.importLibrary("marker");
  //the location of kedah, malaysia for centering 
  const malaysiaPosition = { lat: 5.903295974014964, lng: 100.39410459400102 };
  //the map, centered at malaysia
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    heading: 0,
    tilt: 180,
    center: malaysiaPosition,
    mapId: "d0ef2690d61f11a3", //links to my custom map settings on the api settings
  });
  //this bit is needed for creating windows
  const infoWindow = new google.maps.InfoWindow({
    content: "",
    disableAutoPan: true,
  });

  //this is all from the google maps api doccumentation on map rotations https://developers.google.com/maps/documentation/javascript/webgl/tilt-rotation, i had to add the logs for testing
  const buttons = [
    ["Rotate Left", "rotate", 20, google.maps.ControlPosition.LEFT_CENTER],
    ["Rotate Right", "rotate", -20, google.maps.ControlPosition.RIGHT_CENTER],
    ["Tilt Down", "tilt", 20, google.maps.ControlPosition.TOP_CENTER],
    ["Tilt Up", "tilt", -20, google.maps.ControlPosition.BOTTOM_CENTER],
  ];

  buttons.forEach(([text, mode, amount, position]) => {
    const controlDiv = document.createElement("div");
    const controlUI = document.createElement("button");

    controlUI.classList.add("ui-button");
    controlUI.innerText = `${text}`;
    controlUI.addEventListener("click", () => {
      adjustMap(mode, amount);
    });
    controlDiv.appendChild(controlUI);
    map.controls[position].push(controlDiv);
  });
  const adjustMap = function (mode, amount) {
    switch (mode) {
      case "tilt":
        map.setTilt(map.getTilt() + amount);
        console.log("Tilt")
        break;
      case "rotate":
        map.setHeading(map.getHeading() + amount);
        console.log("Rotate")
        break;
      default:
        break;
    }
  };
  //end of rotation

  //getting rid of null hotel locations so it does not break
  const validHotels = hotelData.filter(hotel => hotel.lat !== null && hotel.lng !== null);
  
  //adding the markers to the map, for each hotel in the validhotels variable
  validHotels.forEach(hotel=>{
    const marker = new google.maps.Marker({
      position: {lat: hotel.lat, lng: hotel.lng },
      label: {
        text: hotel.name,
        color: "Black",
        fontSize: "18px",
        fontWeight: "900",
      },
      map: map,      
    });
    marker.addListener("click", async () => { //activates when the marker is clicked
      const weatherData = await getWeatherInfo(hotel.lat, hotel.lng); // call the function from the top by putting the markers lat and long in
      if (weatherData) {
        const temperatureCelsius = weatherData.main.temp;
        const weatherInfo = `Hotel ID: ${hotel.hotelId}<br></br>Weather: ${weatherData.weather[0].description}, Temperature: ${temperatureCelsius.toFixed(2)}°C,`;
        infoWindow.setContent(weatherInfo); //setting the content of the pop up window to the weather and temp
      } else { //error handling
        infoWindow.setContent('Failed to fetch weather data');
      }
      infoWindow.open(map, marker); //open the window
    });
    markers.push(marker);//adding the marks to my array of displayed markers, this is for the clusting functionality
  });
  const MarkerClusterer = new markerClusterer.MarkerClusterer({ markers, map })
}
initMap();