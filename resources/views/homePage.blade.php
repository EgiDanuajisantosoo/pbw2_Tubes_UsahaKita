<x-navbar>
</x-navbar>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>

    <div class="relative flex flex-col justify-center items-center h-[calc(100vh-4rem)] bg-cover bg-center"
        style="background-image: url('{{ asset('img/bgLandingpage.jpg') }}');">
        <!-- Overlay Transparan -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Teks -->
        <p class="text-center text-5xl font-bold text-white relative z-10 py-5">
            Partner for Growth, Together Towards Success
        </p>
        <p class="text-center text-xl text-gray-200 relative z-10 py-7">
            Empowering Your Business Connections
        </p>

        <a href="#">
            <button
                class="relative z-10 bg-blue-500 hover:bg-blue-600 hover:scale-110 active:bg-blue-700 active:scale-95 text-white font-semibold py-2 px-6 rounded-full shadow-lg transition duration-300 focus:outline-none">
                Get Started
            </button>
        </a>
    </div>






</body>

</html>
