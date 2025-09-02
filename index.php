<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body onload="startTime()">
    <script>
        function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        
        m = checkTime(m);
        
        document.getElementById('txt').innerHTML =
        h + ":" + m;
        if(h>6 && h<12){
            document.getElementById('set').innerHTML =
            "morning";
        }
        if(h>12 && h<18){
            document.getElementById('set').innerHTML =
            "day";
        }
        if(h>18 && h<24){
            document.getElementById('set').innerHTML =
            "day";
        }
        if(h>0 && h<6){
            document.getElementById('set').innerHTML =
            "day";
        }

        var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};
            return i;
        }
        
    </script>

    <?php
        $data = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");
        $weatherData = json_decode($data, true);
    ?>

    <p>Pilsēta: <?php echo $weatherData['city']['name']; ?></p>
    <p>Current Weather</p>
    <p type="datetime-local"></p>

    
     <div id="txt"></div>
     <div id="set"></div>
     <div id="air-quality"></div>
</body>
</html>