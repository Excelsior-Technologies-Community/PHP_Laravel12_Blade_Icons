<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 Blade Icons</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .icon-card {
            transition: all 0.3s ease;
        }

        .icon-card:hover {
            transform: translateY(-6px) scale(1.05);
        }
    </style>
</head>

<body
    class="min-h-screen bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 flex items-center justify-center p-6">

    <div
        class="w-full max-w-3xl backdrop-blur-xl bg-white/20 border border-white/30 shadow-2xl rounded-3xl p-10 text-center">

        <!-- Heading -->
        <h1 class="text-4xl font-extrabold text-white drop-shadow-lg">
            Laravel 12 Blade Icons
        </h1>

        <p class="text-white/80 mt-3 text-lg">
            Modern SVG icon rendering using Blade Icons package
        </p>

        <!-- Icons Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-10">

            <div class="icon-card bg-white/90 rounded-2xl p-6 shadow-lg flex flex-col items-center">
                <x-icon-heart class="w-14 h-14 text-red-500" />
                <span class="mt-3 font-semibold text-gray-700">Heart</span>
            </div>

            <div class="icon-card bg-white/90 rounded-2xl p-6 shadow-lg flex flex-col items-center">
                <x-icon-menu class="w-14 h-14 text-blue-500" />
                <span class="mt-3 font-semibold text-gray-700">Menu</span>
            </div>

            <div class="icon-card bg-white/90 rounded-2xl p-6 shadow-lg flex flex-col items-center">
                <x-icon-search class="w-14 h-14 text-green-500" />
                <span class="mt-3 font-semibold text-gray-700">Search</span>
            </div>

        </div>

        <!-- Divider -->
        <div class="w-24 h-1 bg-white/60 rounded-full mx-auto my-10"></div>

        <!-- 🚀 DIRECT TASK MANAGER BUTTON -->
        <a href="/tasks"
            class="inline-block px-8 py-3 bg-white text-indigo-600 font-bold rounded-full shadow-lg hover:bg-indigo-600 hover:text-white transition">
            ⚡ Open Task Manager
        </a>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="/"
                class="inline-block px-6 py-3 bg-white/80 text-indigo-700 font-semibold rounded-full shadow hover:bg-white transition">
                ← Back to Welcome
            </a>
        </div>

        <p class="text-white/70 text-sm mt-8">
            © 2026 Laravel Blade Icons Demo
        </p>

    </div>

</body>

</html>