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
      Weather in {{ $weather['timezone'] ?? 'Unknown Location' }}
    </h1>

    @if(isset($weather))
      <p>Current Temperature: {{ $weather['current']['temp'] }}°C</p>
      <p>Weather: {{ $weather['current']['weather'][0]['description'] }}</p>
      <p>Humidity: {{ $weather['current']['humidity'] }}%</p>
      <p>Wind Speed: {{ $weather['current']['wind_speed'] }} m/s</p>
    @elseif(isset($error))
      <p>{{ $error }}</p>
    @endif
  </div>
</body>
</html>
