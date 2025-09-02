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
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};
            return i;
        }
        if(){

        }
    </script>
    <?php
        $data = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");
        $weatherData = json_decode($data, true);
    ?>

    <p>Pilsēta: <?php echo $weatherData['city']['name']; ?></p>
    <p>Current Weather</p>
    <p> <?php echo $weatherData['city']['name']; ?></p>
    <p type="datetime-local"></p>

    
     <div id="txt"></div>
</body>
</html>