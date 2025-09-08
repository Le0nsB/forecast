<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VTDT Sky</title>
  <link rel="stylesheet" href="style.css">
</head>
<body onload="startTime()">

<?php
  $data = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");
  $weatherData = json_decode($data, true);
?>

<header>
  <div class="header-left">
    <button class="menu-btn">☰</button>
    <span class="vtdt_sky">VTDT Sky</span>
    <span class="location">
      <img class="gif" src='google-maps.gif'>
      <?php echo $weatherData['city']['name'] . ", " . $weatherData['city']['country']; ?>
    </span>
  </div>

  <div class="header-center">
    <div class="search-bar">
      <input type="text" placeholder="Search...">
      <button class="search-icon"><img class="gif" src="worldwide.gif"></button>
    </div>
    <button class="theme-toggle">🌙 Dark</button>
  </div>

  <div class="header-right">
    <button class="icon-btn"><img class="gif" src="notification.gif"></img></button>
    <button class="icon-btn"><img class="gif" src="settings.gif"></img></button>
  </div>
</header>


<div class="container">

  <div>
    <div class="card">
      <h2>Current Weather</h2>

      <div class="unit-toggle-wrapper">
        <select id="unit-toggle" aria-label="Unit toggle">
          <option value="metric">Celsius and Kilometers</option>
          <option value="imperial">Fahrenheit and Miles</option>
        </select>
      </div>

      <div id="txt"></div>
      <div class="weather-row">
        <div class="big-temp">
          <span id="set"></span><span class="degree">°C</span>
        </div>
        <div>
          <div id="weather" class="weather-main">
            <?php echo $weatherData['list'][0]['weather'][0]['main']; ?>
          </div>
          <div id="feels_like" class="feels-like"></div>
        </div>
      </div>
      <div id="deg"></div>
  </div>



  <div class="grid-3">
    <div class="card">
      <h2><img class="gif" src='clouds.gif'>Air Quality</h2>
      <div>1</div>
    </div>

    <div class="card">
      <h2><img class="gif" src='wind.gif'>Wind</h2>
      <div class="wind-value" data-kmh="<?php echo $weatherData['list'][0]['speed']; ?>">
        <?php echo $weatherData['list'][0]['speed']; ?> km/h
      </div>
    </div>

    <div class="card">
      <h2><img class="gif" src='humidity.gif'>Humidity</h2>
      <div><?php echo $weatherData['list'][0]['humidity']; ?>%</div>
    </div>

    <div class="card">
      <h2><img class="gif" src='visibility.gif'>Visibility</h2>
      <div class="visibility-value" data-km="10">10 km</div>
    </div>

    <div class="card">
      <h2><img class="gif" src='pressure.gif'>Pressure</h2>
      <div>
        <?php 
          $pressure_hpa = $weatherData['list'][0]['pressure'];
          $pressure_in = round($pressure_hpa * 0.02953, 2);
          echo $pressure_in . " in";
        ?>
      </div>
    </div>

    <div class="card">
      <h2><img class="gif" src='pressure.gif'>Pressure</h2>
      <div><?php echo $weatherData['list'][0]['pressure']; ?>°</div>
    </div>

  </div>
     
    <div class="card">
      <h2>Sun & Moon Summary</h2>

      <div class="grid-3">
        
        <div>
          <div><img class="gif" src='sunrise.gif'> </img></div>
          <div>Sunrise<br>06:28 AM</div>
        </div>
        
        <div>
          <div><img class="gif" src='moon-rise.gif'> </img></div>
          <div>Moonrise<br>07:46 PM</div>
        </div>

        <div>
          <div><img class="gif" src='sunset.gif'> </img></div>
          <div>Sunset<br>08:05 PM</div>
        </div>

        <div>
          <div><img class="gif" src='moon-set.gif'> </img></div>
          <div>Moonset<br>02:26 AM</div>
        </div>
        
      </div>
    </div>
  </div>

  
  <div class="forecast">
  <h3>Today</h3>

  <div class="forecast-item">
    <div class="forecast-left">
      <div class="time">12:00AM</div>
      <div class="cond">Mist</div>
    </div>
    <div class="forecast-right">
      <div class="top-row">
        <div class="forecast-temp">15.2<span class="degree">°C</span></div>
        <div class="wind">Wind: 5 km/h</div>
      </div>
      <div class="humidity">Humidity: 94%</div>
    </div>
  </div>

  <div class="forecast-item">
    <div class="forecast-left">
      <div class="time">1:00AM</div>
      <div class="cond">Mist</div>
    </div>
    <div class="forecast-right">
      <div class="top-row">
        <div class="forecast-temp">14.9<span class="degree">°C</span></div>
        <div class="wind">Wind: 5.4 km/h</div>
      </div>
      <div class="humidity">Humidity: 94%</div>
    </div>
  </div>

  <div class="forecast-item">
    <div class="forecast-left">
      <div class="time">2:00AM</div>
      <div class="cond">Mist</div>
    </div>
    <div class="forecast-right">
      <div class="top-row">
        <div class="forecast-temp">14.7<span class="degree">°C</span></div>
        <div class="wind">Wind: 5.4 km/h</div>
      </div>
      <div class="humidity">Humidity: 95%</div>
    </div>
  </div>

  <div class="forecast-item">
    <div class="forecast-left">
      <div class="time">3:00AM</div>
      <div class="cond">Mist</div>
    </div>
    <div class="forecast-right">
      <div class="top-row">
        <div class="forecast-temp">12.9<span class="degree">°C</span></div>
        <div class="wind">Wind: 5.4 km/h</div>
      </div>
      <div class="humidity">Humidity: 91%</div>
    </div>
  </div>

  <div class="forecast-item">
    <div class="forecast-left">
      <div class="time">5:00AM</div>
      <div class="cond">Mist</div>
    </div>
    <div class="forecast-right">
      <div class="top-row">
        <div class="forecast-temp">14.3<span class="degree">°C</span></div>
        <div class="wind">Wind: 5.2 km/h</div>
      </div>
      <div class="humidity">Humidity: 98%</div>
    </div>
  </div>

</div>

</div>

  <script>
  //NEAIZTIKT//
  const weatherData = <?php echo $data; ?>;
  //NEAIZTIKT//

  let currentUnit = 'metric';

  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    m = checkTime(m);

    const morn = weatherData.list[0].feels_like.morn;
    const day = weatherData.list[0].feels_like.day;
    const eve = weatherData.list[0].feels_like.eve;
    const night = weatherData.list[0].feels_like.night;

    const morn_t = weatherData.list[0].temp.morn;
    const day_t = weatherData.list[0].temp.day;
    const eve_t = weatherData.list[0].temp.eve;
    const night_t = weatherData.list[0].temp.night;

    const deg = weatherData.list[0].deg;

    let text;
    if (0 <= deg && deg <= 10) { text = "N"; }
    else if (10 < deg && deg <= 80) { text = "N/NE"; }
    else if (80 < deg && deg <= 100) { text = "E"; }
    else if (100 < deg && deg <= 170) { text = "SE"; }
    else if (170 < deg && deg <= 190) { text = "S"; }
    else if (190 < deg && deg <= 260) { text = "SW"; }
    else if (260 < deg && deg <= 280) { text = "W"; }
    else if (280 < deg && deg <= 350) { text = "NW"; }
    else { text = "Unknown"; }

    document.getElementById("deg").innerHTML = "Current wind direction: " + text;
    if(h<12){
      document.getElementById('txt').innerHTML = "Local time: " + h + ":" + m + " AM";
    } else {
      document.getElementById('txt').innerHTML = "Local time: " + (h-12) + ":" + m + " PM";
    };

    let displayC;
    if(h>=6 && h<=12){
      displayC = morn_t;
      document.getElementById('set').innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-sunrise"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17h1m16 0h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7m-9.7 5.7a4 4 0 0 1 8 0" /><path d="M3 21l18 0" /><path d="M12 9v-6l3 3m-6 0l3 -3" /></svg>' + morn_t;
      document.getElementById('feels_like').innerHTML = "Feels like " + morn + "°C";
    } else if(h>=12 && h<=18){
      displayC = day_t;
      document.getElementById('set').innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-sun"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>' + day_t;
      document.getElementById('feels_like').innerHTML = "Feels like " + day + "°C";
    } else if(h>=18 && h<=24){
      displayC = eve_t;
      document.getElementById('set').innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-sunset"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17h1m16 0h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7m-9.7 5.7a4 4 0 0 1 8 0" /><path d="M3 21l18 0" /><path d="M12 3v6l3 -3m-6 0l3 3" /></svg>' + eve_t;
      document.getElementById('feels_like').innerHTML = "Feels like " + eve + "°C";
    } else if(h>=0 && h<=6){
      displayC = night_t;
      document.getElementById('set').innerHTML = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-moon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>' + night_t;
      document.getElementById('feels_like').innerHTML = "Feels like " + night + "°C";
    };

    const setEl = document.getElementById('set');
    const feelsEl = document.getElementById('feels_like');
    if (!isNaN(parseFloat(displayC))) {
      setEl.dataset.c = parseFloat(displayC);
    }
    let feelsNumMatch = (feelsEl.textContent || "").match(/-?\d+(\.\d+)?/);
    if (feelsNumMatch) feelsEl.dataset.c = parseFloat(feelsNumMatch[0]);

    storeMetricValues();
    applyUnits(document.getElementById('unit-toggle').value || currentUnit);

    var t = setTimeout(startTime, 500);
  }

  function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
  }

  document.addEventListener("DOMContentLoaded", () => {
      const themeBtn = document.querySelector(".theme-toggle");
      themeBtn.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
        if (document.body.classList.contains("dark-mode")) {
          themeBtn.textContent = "🌞 Light";
        } else {
          themeBtn.textContent = "🌙 Dark";
        }
      });

      const unitToggle = document.getElementById('unit-toggle');
      unitToggle.addEventListener('change', (e) => {
        currentUnit = e.target.value;
        applyUnits(currentUnit);
      });

      storeMetricValues();
      currentUnit = unitToggle.value || 'metric';
      applyUnits(currentUnit);
  });

  function storeMetricValues() {
    const setEl = document.getElementById('set');
    if (setEl && !setEl.dataset.c) {
      const match = (setEl.textContent || "").match(/-?\d+(\.\d+)?/);
      if (match) setEl.dataset.c = parseFloat(match[0]);
    }

    const feelsEl = document.getElementById('feels_like');
    if (feelsEl && !feelsEl.dataset.c) {
      const m = (feelsEl.textContent || "").match(/-?\d+(\.\d+)?/);
      if (m) feelsEl.dataset.c = parseFloat(m[0]);
    }

    document.querySelectorAll('.forecast-temp').forEach(el => {
      if (!el.dataset.c) {
        const m = (el.textContent || "").match(/-?\d+(\.\d+)?/);
        if (m) el.dataset.c = parseFloat(m[0]);
      }
    });

    document.querySelectorAll('.forecast-right .wind').forEach(el => {
      if (!el.dataset.kmh) {
        const m = (el.textContent || "").match(/-?\d+(\.\d+)?/);
        if (m) el.dataset.kmh = parseFloat(m[0]);
      }
    });

    document.querySelectorAll('.wind-value').forEach(el => {
      if (!el.dataset.kmh) {
        const m = (el.textContent || "").match(/-?\d+(\.\d+)?/);
        if (m) el.dataset.kmh = parseFloat(m[0]);
      }
    });

    document.querySelectorAll('.visibility-value').forEach(el => {
      if (!el.dataset.km) {
        const m = (el.textContent || "").match(/-?\d+(\.\d+)?/);
        if (m) el.dataset.km = parseFloat(m[0]);
      }
    });

    document.querySelectorAll('.pressure-value').forEach(el => {
      if (!el.dataset.hpa) {
        const m = (el.textContent || "").match(/-?\d+(\.\d+)?/);
        if (m) el.dataset.hpa = parseFloat(m[0]);
      }
    });
  }

  function applyUnits(unit) {
    currentUnit = unit || 'metric';

    const setEl = document.getElementById('set');
    if (setEl && setEl.dataset.c) {
      const c = parseFloat(setEl.dataset.c);
      const svg = setEl.querySelector('svg');
      const svgHTML = svg ? svg.outerHTML + ' ' : '';
      const displayed = (unit === 'metric') ? c.toFixed(1) : (c * 9/5 + 32).toFixed(1);
      setEl.innerHTML = svgHTML + displayed;
      const bigDegree = document.querySelector('.big-temp .degree');
      if (bigDegree) bigDegree.textContent = (unit === 'metric') ? '°C' : '°F';
    }

    const feelsEl = document.getElementById('feels_like');
    if (feelsEl && feelsEl.dataset.c) {
      const c = parseFloat(feelsEl.dataset.c);
      const displayed = (unit === 'metric') ? c.toFixed(1) : (c * 9/5 + 32).toFixed(1);
      feelsEl.textContent = 'Feels like ' + displayed + (unit === 'metric' ? '°C' : '°F');
    }

    document.querySelectorAll('.forecast-temp').forEach(el => {
      const c = parseFloat(el.dataset.c);
      if (isNaN(c)) return;
      const displayed = (unit === 'metric') ? c.toFixed(1) : (c * 9/5 + 32).toFixed(1);
      el.innerHTML = displayed + '<span class="degree">' + (unit === 'metric' ? '°C' : '°F') + '</span>';
    });

    document.querySelectorAll('.forecast-right .wind').forEach(el => {
      const kmh = parseFloat(el.dataset.kmh);
      if (isNaN(kmh)) return;
      if (unit === 'metric') {
        el.textContent = 'Wind: ' + kmh.toFixed(1) + ' km/h';
      } else {
        el.textContent = 'Wind: ' + (kmh / 1.609).toFixed(1) + ' mph';
      }
    });

    document.querySelectorAll('.wind-value').forEach(el => {
      const kmh = parseFloat(el.dataset.kmh);
      if (isNaN(kmh)) return;
      if (unit === 'metric') {
        el.textContent = kmh.toFixed(1) + ' km/h';
      } else {
        el.textContent = (kmh / 1.609).toFixed(1) + ' mph';
      }
    });

    document.querySelectorAll('.visibility-value').forEach(el => {
      const km = parseFloat(el.dataset.km);
      if (isNaN(km)) return;
      if (unit === 'metric') {
        el.textContent = km.toFixed(1) + ' km';
      } else {
        el.textContent = (km / 1.609).toFixed(1) + ' mi';
      }
    });

    document.querySelectorAll('.pressure-value').forEach(el => {
      const hpa = parseFloat(el.dataset.hpa);
      if (isNaN(hpa)) return;
      if (unit === 'metric') {
        el.textContent = Math.round(hpa) + ' hPa';
      } else {
        el.textContent = (hpa * 0.0295299830714).toFixed(2) + ' inHg';
      }
    });
  }
  </script>
  </body>
</html>
