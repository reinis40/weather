<?php
$apiKey = "2d8d10946424f882a87aa623f3912d19";
$city = readline('Input which city ');
$country = readline('Enter the country code ');
$location = $city;
if (!empty($country)) {
    $location .= ',' . $country;
}
$dataFromApi = "https://api.openweathermap.org/data/2.5/weather?q=".($location)."&appid=".$apiKey;
$response = file_get_contents($dataFromApi);
if ($response !== false) {
    $weatherData = json_decode($response, true);
    if ($weatherData !== null) {
        $temperatureKelvin = $weatherData['main']['temp'];
        $temperature = $temperatureKelvin - 273.15;
        $weatherDescription = $weatherData['weather'][0]['description'];
        echo "The temperature in $city is " . round($temperature, 2) . "°C with " . $weatherDescription . ".";
    } else {
        exit('location not found');
    }
} else {
    exit('location not found');
}

