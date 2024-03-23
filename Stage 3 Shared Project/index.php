<!DOCTYPE html>
<html lang="en">
<head>
    <title>National Water Research Institute</title>
    <link rel="stylesheet" href="css/map.css"/>
    <link rel="stylesheet" href="js/map.js"/>
    <link rel="stylesheet" href="css/mobile.css" />
    <link
      rel="stylesheet"
      href="css/index.css"
      media="only screen and (min-width : 720px)"
    />

</head>
<body>
    <div class="main">
        <?php include("includes/header.php")?>
        <div class="icon">
            <div class="logo">
                <img src="images/logo_jata_2022_en.png">
            </div>
        </div>
        <!-- <div class="Menu">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <ul>
                <li><a href="hotels.php">Hotels</a></li>
            </ul>
            <ul>
                <li><a href="#"></a></li>
            </ul>
            <div class="Search">
                <input class="srch" type="search" name="" placeholder="Search">
                <a href="#"><button class="btn">Search</button></a>
            </div>
        </div> -->
    </div>
        <div class="content">
        <div class="map"></div>
            <script>(g=>{var h, a, k, p="Hotels maps API",c="google",l="importLibary",q="__ib__", m=document, b=window ;b=b[c]||(b[c]={});var d=b.maps={})
            ,r=new Set, e=new URLSearchParams, u=()=>h||h=new Promise(async(f,n)=>
            {await (a=m.createElement("script"));e.set("libaries",[...r]+"");
            for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps" +q);a.scr="https://www.google.com/maps/place/Kedah,+Malaysia/@5.8117643,99.7142838,9z/data=!3m1!4b1!4m6!3m5!1s0x304976135f4045a1:0x6ce483110aab4ea4!8m2!3d6.0498656!4d100.5296115!16zL20vMDF4bDQ2?authuser=0&entry=ttu",
                :g):d=[l]=f=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})</script>
        </div>
        <?php include("includes/footer.php")?>
</body>
</html> 

