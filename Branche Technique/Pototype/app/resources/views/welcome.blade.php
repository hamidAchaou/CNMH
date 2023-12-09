<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>{{ __('words.welcome_to_your_app') }}</title>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-md bg-white p-8 rounded shadow-md">
        <h1 class="text-3xl font-semibold mb-4">{{ __('words.welcome_to_your_app') }}</h1>
        <p class="text-gray-600 mb-6">{{ __('words.get_started_with_amazing_features') }}</p>
        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">{{ __('words.log_in') }}</a>
    </div>
</body>

</html>
