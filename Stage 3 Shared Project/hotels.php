<?php
require_once("config.php");
//query to get all hotels
$queryHotels = "SELECT * FROM hotelandhomestays";
$resultHotels = $mysqli->query( $queryHotels );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>National Water Research Institute</title>
    <link rel="stylesheet" href="css/mobile.css" />
    <link
      rel="stylesheet"
      href="css/index.css"
      media="only screen and (min-width : 720px)"
    />
</head>
<body>
    <?php include("includes/header.php")?>
    <div class="main">
        <!-- Hotel Listing Here -->
        <div class="table-container">
            <table>
            <tr>
            <th>Hotel</th>
            <th>Hotel Address</th>
            <th>Region</th>
            </tr>
            <?php
            while ($obj = $resultHotels -> fetch_object()) {
            echo "<tr>";
            echo "<td>{$obj->hotel_name}</a></td>";
            echo "<td>{$obj->street_address}</td>";
            echo "<td>&pound; {$obj->region}</td>";
            echo "</tr>";
            }
            ?>
            </table>
        </div>
    </div>
    <?php include("includes/footer.php")?>
</body>
</html>
