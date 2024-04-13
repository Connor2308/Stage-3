<?php
require_once("config.php");
//get all hotels
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
    <!-- <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: "AIzaSyC68DglTmjWDwWer3IbxnSfHzPkLNLDaOw", v: "weekly"});</script> -->
    
    <?php include("includes/header.php")?>
    <?php include("includes/footer.php")?>
    
    
</body>
</html> 
