<?php
$apiKey = "2d8d10946424f882a87aa623f3912d19";
$city = readline('Input which city ');
$country = readline('Enter the country code ');
$location = $city;
if (!empty($country)) {
    $location .= ',' . $country;
}
$endPoint = "https://api.openweathermap.org/data/2.5/weather?q=".($location)."&appid=".$apiKey;
$response = file_get_contents($endPoint);
if ($response !== false) {
    $weatherData = json_decode($response, true);
    if ($weatherData !== null) {
        $temperatureKelvin = $weatherData['main']['temp'];
        $temperature = $temperatureKelvin - 273.15;//from kelvin to celsius
        $weatherDescription = $weatherData['weather'][0]['description'];
        echo "The temperature in $city is " . round($temperature, 2) . "°C with " . $weatherDescription . ".";
    } else {
        exit('bad input');
    }
} else {
    exit('bad input');
}

