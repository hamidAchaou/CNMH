<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Authentication</title>
    <!-- Linking Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation bar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="#" class="text-white text-xl font-bold">YourApp</a>
            </div>
            <div>
                <a href="{{ url('login') }}" class="text-white hover:underline mr-4">Login</a>
                <a href="{{ url('register') }}" class="text-white hover:underline">Register</a>
            </div>
        </div>
    </nav>

    <!-- Welcome content -->
    <div class="container mx-auto flex justify-center items-center flex-col mt-12">
        {{-- <img src="https://via.placeholder.com/300" alt="Welcome Image" class="mb-8 rounded-full shadow-lg"> --}}

        <h1 class="text-4xl font-bold mb-4">Welcome to Authentication with Laravel</h1>
        <p class="text-lg text-gray-700 mb-8">Start your authentication journey here!</p>
        
        <div>
            <a href="{{ url('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-4">Login</a>
            <a href="{{ url('register') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Register</a>
        </div>
    </div>
</body>
</html>
