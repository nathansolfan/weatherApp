<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather App</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

  <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">
      Check the Weather
    </h1>

    <form method="GET" action="/" class="mb-6">
      <div class="mb-4">
        <label for="city" class="block text-gray-700 text-sm font-semibold mb-2">City Name:</label>
        <input type="text" name="city" id="city" placeholder="Enter city name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
        Check the Weather
      </button>
    </form>

    @if(isset($weather['main']))
      <div class="bg-blue-50 p-4 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Weather in {{ $weather['name'] ?? 'Unknown Location' }}</h2>
        <p class="text-lg text-gray-700 mb-2"><span class="font-bold text-blue-500">Temperature:</span> {{ $weather['main']['temp'] }}°C</p>
        <p class="text-lg text-gray-700 mb-2"><span class="font-bold text-blue-500">Condition:</span> {{ ucfirst($weather['weather'][0]['description'] ?? 'N/A') }}</p>
        <p class="text-lg text-gray-700 mb-2"><span class="font-bold text-blue-500">Humidity:</span> {{ $weather['main']['humidity'] ?? 'N/A' }}%</p>
        <p class="text-lg text-gray-700"><span class="font-bold text-blue-500">Wind Speed:</span> {{ $weather['wind']['speed'] ?? 'N/A' }} m/s</p>
      </div>
    @elseif(isset($error))
      <div class="bg-red-50 p-4 rounded-lg shadow-md mt-6">
        <p class="text-red-500 text-lg font-semibold">Error: {{ $error }}</p>
      </div>
    @else
      <div class="bg-yellow-50 p-4 rounded-lg shadow-md mt-6">
        <p class="text-yellow-500 text-lg font-semibold">No weather data available.</p>
      </div>
    @endif
  </div>

</body>
</html>
