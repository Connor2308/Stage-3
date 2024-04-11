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
        
       
    </div>
        <div class="content">
        <div class="map"></div>
        <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyD6F17_mmaLHl470cN-mwe8FKPFg_On0-A", v: "weekly"});</script>
        </div>
        <?php include("includes/footer.php")?>
</body>
</html> 
