<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        //  https://api.openweathermap.org/data/3.0/onecall?lat={lat}&lon={lon}&exclude={part}&appid={API key}
        $lat = '51.5074';
        $lon = '-0.1278';
        $apiKey = env('OPENWEATHER_API_KEY');

        // Make a request to the One Call API 3.0
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&exclude=minutely,hourly,alerts&units=metric&appid={$apiKey}");

        if ($response->successful()) {
            // the json answer into a variable
            $weatherApp = $response->json();
            return view('weather', ['weather' => $weatherApp]);
        }

        $error = $response->json()['message'] ?? 'Unable to fetch weather data.';
        return view('weather', ['error' => $error]);
    }
}
