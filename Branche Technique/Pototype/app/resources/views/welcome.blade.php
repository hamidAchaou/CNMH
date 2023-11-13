<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Welcome to Your App</title>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-md bg-white p-8 rounded shadow-md">
        <h1 class="text-3xl font-semibold mb-4">Welcome to Your App</h1>
        <p class="text-gray-600 mb-6">Get started with our amazing features.</p>
        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Log in</a>
    </div>
</body>

</html>
