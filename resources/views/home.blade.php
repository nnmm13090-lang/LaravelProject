<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="w-full h-18 bg-blue-500 flex justify-evenly items-center sticky top-0">
                <div class="">
                    <h1 class="text-3xl font-bold">Davith24K</h1>
                </div>
                <div class="text-xl">
                    <ul class="flex gap-10">
                        <li><a href="">Home</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Categoreis</a></li>
                        <li><a href="">Contect</a></li>
                    </ul>
                </div>
                <div class="text-xl flex gap-15">
                    <a href="">Login</a>
                    <a href="">Register</a>
                </div>
            </div>
        </nav>

        <div class="w-full h-110 bg-yellow-50 flex justify-center">
            <div class="w-[72%] h-full flex">
                <div class="w-1/2 h-full pt-8 pe-5">
                    <h3><span class="text-2xl bg-orange-400 px-2 py-1 rounded-md text-white">✦ Welcome to Davith24K</span></h3>
                    <h1 class="text-6xl font-bold leading-20 tracking-wide">Ideas worth <br> <span class="text-orange-400">reading</span>, stories <br> worth sharing</h1>
                    <br>
                    <p class="text-lg">Discover thoughtful articles on technology, design, and the intersections of modern life. Written by thinkers, for curious minds.</p>
                    <a href="#" class="inline-block text-xl px-2 py-1 mt-5 bg-blue-100 rounded-md">Start Reading</a>
                </div>
                <div class="w-1/2 h-full flex justify-center items-end">
                    <img src="" alt="" class="w-full h-90 bg-red-400 rounded-md">
                </div>
            </div>
        </div>

        <div class="w-full h-54 bg-lime-200 flex justify-center">
            <div class="w-[24%] h-full bg-rose-100"></div>
            <div class="w-[24%] h-full bg-sky-100"></div>
            <div class="w-[24%] h-full bg-rose-300"></div>
        </div>
    </div>
</body>

</html>