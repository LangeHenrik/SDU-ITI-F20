<?php
// File get contents: contains all json text 
// json_decode: turn json to an actual object
$locationJson = file_get_contents("https://ipapi.co/" . $_SERVER['REMOTE_ADDR'] . "/json");
$locationObject = json_decode($locationJson);

// explode: String manipluation to get the languageCode
$languageCode = explode("-", explode(",", $locationObject->languages)[0])[0];
$helloURL = "https://fourtonfish.com/hellosalut/?lang=" . $languageCode;
$helloJson = file_get_contents($helloURL);
$helloObject = json_decode($helloJson);

$dogJson = file_get_contents("https://random.dog/woof.json");
$dogObject = json_decode($dogJson);

$weatherJson = file_get_contents("https://www.metaweather.com/api/location/search/?query=" . $locationObject->city);
$weatherObject = json_decode($weatherJson);
$weatherJson2 = file_get_contents("https://www.metaweather.com/api/location/" . $weatherObject[0]->woeid);
$weatherObject = json_decode($weatherJson2)->consolidated_weather[0];

$breakingJson = file_get_contents("https://breaking-bad-quotes.herokuapp.com/v1/quotes");
$breakingBad = json_decode($breakingJson)[0];

?>

<html>

<head>
    <title>API example</title>
    <meta charset="uft-8">
    <meta name="viewpoint" content="width=device-width" , initial-scale="1.0">
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
</head>

<body>
    <style>
        div.content {
            margin: 0 auto;
            border: 1px solid grey;
            padding: 10px;
            border-radius: 10px;
            width: 500px;
            max-width: 90%;
            min-width: 100px;
        }

        div.left {
            width: 20%;

        }

        div.right {
            width: 79%;
        }

        div.left,
        div.right {
            display: inline-block;

        }

        img.dog {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
    <?php

    if (isset($_GET['name'])) : ?>
        <div class="content">
            <div class="left">
                <img src="<?= $dogObject->url; ?>" alt="dog" class="dog" />
            </div>
            <div class="right">
                <?= $helloObject->hello; ?>, <?= $_GET['name']; ?>
                <br /><br />
                Your IP adress is: <?= substr($_SERVER['REMOTE_ADDR'], 0, 7); ?> ***.***
                <br /><br />

                Looks like you are in <img class="flag" alt="country flag" src="http://countryflags.org/flags/<?= $languageCode; ?>-t.gif" style="height: 10px;" /> <?= $locationObject->city; ?>, <?= $locationObject->region; ?>, <?= $locationObject->country; ?>
                </br>
                Longitude/Latitude: <?= $locationObject->longitude; ?>, <?= $locationObject->latitude; ?>
                <br /><br />

                <img src="https://www.metaweather.com/static/img/weather/png/64/<?= $weatherObject->weather_state_abbr; ?>.png" alt="weather" style="height: 14px;" />
                <? explode(".", $weatherObject->the_temp)[0]; ?>&deg;C


            </div>
        </div>

        </br>

        <center>
            <?= $breakingBad->author; ?> says <b>"<?= $breakingBad->quote; ?>"</b>
            <br /><br />
            <script type="text/javascript" language="javascript" src="https://www.boxofficemojo.com/data/js/wknd5.php"></script>
        </center>

        <style>
            #map {
                width: 700px;
                height: 400px;

            }
        </style>

        <div id="map"></div>

        <script>
            var map = L.map('map').setView([<?= $locationObject->latitude ?>, <?= $locationObject->longitude ?>], 12);

            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([<?= $locationObject->latitude ?>, <?= $locationObject->longitude ?>]).addTo(map)
                .bindPopup('You are <span style="color: $f00;">here</span>').openPopup();
        </script>
    <?php else : ?>
        I didn't GET your name
    <?php endif; ?>

</body>

</html>