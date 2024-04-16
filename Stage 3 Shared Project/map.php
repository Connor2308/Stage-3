<?php
require_once("config.php");
//get all hotels  information
$queryHotels = "SELECT * FROM hotelandhomestays";
$resultHotels = $conn->query($queryHotels);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>National Water Research Institute</title>
  <link rel="stylesheet" href="css/map.css"/>
  <link rel="stylesheet" href="css/mobile.css" />
  <link rel="stylesheet" href="css/index.css" media="only screen and (min-width : 720px)" />
  <script type="module" src="js/map.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC68DglTmjWDwWer3IbxnSfHzPkLNLDaOw&callback=initMap" async defer></script>
  <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
  

</head>
<body>
  <input id="pac_input" class="controls" type="text" placeholder="Search"/>
    <div class="main"></div>
    <div id="map"></div>
    <?php
    echo "<script>";
    echo "let hotelData = ["; //declaring hotel data variable
    while ($row = $resultHotels->fetch_object()) {
      $hotelName = $row->hotel_name;
      $lat = $row->latitude;
      $lng = $row->longitude;
      $hId = $row->hotel_id;
      echo "{ name: '$hotelName', lat: $lat, lng: $lng, hotelId: $hId},";
    }
    echo "];";
    echo "</script>";
    ?>
    
    <?php include("includes/header.php")?>
    <?php include("includes/footer.php")?>
    
</body>
</html> 
