<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold underline">
      Weather in {{ $weather['name'] ?? 'Unknown Location' }}
    </h1>

    @if(isset($weather['main']))
      <p>Current Temperature: {{ $weather['main']['temp'] }}°C</p>
      <p>Weather: {{ $weather['weather'][0]['description'] ?? 'N/A' }}</p>
      <p>Humidity: {{ $weather['main']['humidity'] ?? 'N/A' }}%</p>
      <p>Wind Speed: {{ $weather['wind']['speed'] ?? 'N/A' }} m/s</p>
    @elseif(isset($error))
      <p class="text-red-500">Error: {{ $error }}</p>
    @else
      <p class="text-red-500">No weather data available.</p>
    @endif
  </div>
</body>
</html>
