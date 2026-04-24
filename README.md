# PHP_Laravel12_Blade_Icons

Introduction

PHP_Laravel12_Blade_Icons is a simple demonstration project that shows how to integrate and use the Blade Icons package in a Laravel 12 application.
The project focuses on configuring custom SVG icons, rendering them inside Blade views, and building a modern UI to display the icons in a clean and practical way.

---

## Project Overview

In this project, you will learn how to:

- Install and configure Blade Icons in Laravel 12

- Create and register custom SVG icon files

- Render icons using Blade components

- Build a modern responsive UI to display icons

- Understand the basic structure required for icon integration

- The project does not require a database, making it lightweight, easy to understand, and ideal for beginners who want to explore Laravel UI customization using SVG icons.

---

## Prerequisites

Before starting make sure you have:

- Composer installed  
- PHP 8.1+  
- Node & NPM  
- Laravel Installer (optional)  

Check PHP:

```bash
php -v
```

Check Composer:

```bash
composer -v
```

---

## Step 1: Laravel 12 Installation

Inside your development directory run:

```bash
composer create-project laravel/laravel PHP_Laravel12_Blade_Icons "12.*"
```

Go to project folder:

```bash
cd PHP_Laravel12_Blade_Icons
```

---

## Step 2: Blade Icons Installation

Install Blade Icons package:

```bash
composer require blade-ui-kit/blade-icons
```

---


## Step 3: Publishing and Configuring Icons

Blade Icons comes with a config file. Publish it:

```bash
php artisan vendor:publish --tag=blade-icons
```

You will see:

Copied FilePath: config/blade-icons.php


Open config/blade-icons.php and update:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Icons Sets
    |--------------------------------------------------------------------------
    |
    | With this config option you can define a couple of
    | default icon sets. Provide a key name for your icon
    | set and a combination from the options below.
    |
    */

    'sets' => [

        'default' => [
        
            /*
            |-----------------------------------------------------------------
            | Icons Path
            |-----------------------------------------------------------------
            |
            | Provide the relative path from your app root to your SVG icons
            | directory. Icons are loaded recursively so there's no need to
            | list every sub-directory.
            |
            | Relative to the disk root when the disk option is set.
            |
            */
        
            'path' => 'resources/svg',
        //
        //     /*
        //     |-----------------------------------------------------------------
        //     | Filesystem Disk
        //     |-----------------------------------------------------------------
        //     |
        //     | Optionally, provide a specific filesystem disk to read
        //     | icons from. When defining a disk, the "path" option
        //     | starts relatively from the disk root.
        //     |
        //     */
        //
        //     'disk' => '',
        //
        //     /*
        //     |-----------------------------------------------------------------
        //     | Default Prefix
        //     |-----------------------------------------------------------------
        //     |
        //     | This config option allows you to define a default prefix for
        //     | your icons. The dash separator will be applied automatically
        //     | to every icon name. It's required and needs to be unique.
        //     |
        //     */
        //
            'prefix' => 'icon',
        //
        //     /*
        //     |-----------------------------------------------------------------
        //     | Fallback Icon
        //     |-----------------------------------------------------------------
        //     |
        //     | This config option allows you to define a fallback
        //     | icon when an icon in this set cannot be found.
        //     |
        //     */
        //
        //     'fallback' => '',
        //
        //     /*
        //     |-----------------------------------------------------------------
        //     | Default Set Classes
        //     |-----------------------------------------------------------------
        //     |
        //     | This config option allows you to define some classes which
        //     | will be applied by default to all icons within this set.
        //     |
        //     */
        //
        //     'class' => '',
        //
        //     /*
        //     |-----------------------------------------------------------------
        //     | Default Set Attributes
        //     |-----------------------------------------------------------------
        //     |
        //     | This config option allows you to define some attributes which
        //     | will be applied by default to all icons within this set.
        //     |
        //     */
        //
        //     'attributes' => [
        //         // 'width' => 50,
        //         // 'height' => 50,
            // ],
        
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global Default Classes
    |--------------------------------------------------------------------------
    |
    | This config option allows you to define some classes which
    | will be applied by default to all icons.
    |
    */

    'class' => '',

    /*
    |--------------------------------------------------------------------------
    | Global Default Attributes
    |--------------------------------------------------------------------------
    |
    | This config option allows you to define some attributes which
    | will be applied by default to all icons.
    |
    */

    'attributes' => [
        // 'width' => 50,
        // 'height' => 50,
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Fallback Icon
    |--------------------------------------------------------------------------
    |
    | This config option allows you to define a global fallback
    | icon when an icon in any set cannot be found. It can
    | reference any icon from any configured set.
    |
    */

    'fallback' => '',

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | These config options allow you to define some
    | settings related to Blade Components.
    |
    */

    'components' => [

        /*
        |----------------------------------------------------------------------
        | Disable Components
        |----------------------------------------------------------------------
        |
        | This config option allows you to disable Blade components
        | completely. It's useful to avoid performance problems
        | when working with large icon libraries.
        |
        */

        'disabled' => false,

        /*
        |----------------------------------------------------------------------
        | Default Icon Component Name
        |----------------------------------------------------------------------
        |
        | This config option allows you to define the name
        | for the default Icon class component.
        |
        */

        'default' => 'icon',

    ],

];
```

---

## Step 4: Adding Custom Icons

Create a folder to store your custom icons:

```bash
resources/svg
```

Place some SVG files like:

```css
resources/svg/
├─ heart.svg
├─ menu.svg
├─ search.svg
```

### 4.1) heart.svg

Add:

```
<svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
           2 5.42 4.42 3 7.5 3
           c1.74 0 3.41.81 4.5 2.09
           C13.09 3.81 14.76 3 16.5 3
           19.58 3 22 5.42 22 8.5
           c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
</svg>
```

### 4.2) menu.svg

Add:

```
<svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
```

### 4.3) search.svg

Add:

```
<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
  <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
```

---

## Step 5: Blade View

Create this file:

```bash
resources/views/icons-demo.blade.php
```

### icons-demo.blade.php

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 Blade Icons</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Smooth animation */
        .icon-card {
            transition: all 0.3s ease;
        }
        .icon-card:hover {
            transform: translateY(-6px) scale(1.05);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 flex items-center justify-center p-6">

    <!-- Glass Card Container -->
    <div class="w-full max-w-3xl backdrop-blur-xl bg-white/20 border border-white/30 shadow-2xl rounded-3xl p-10 text-center">

        <!-- Heading -->
        <h1 class="text-4xl font-extrabold text-white drop-shadow-lg">
            Laravel 12 Blade Icons
        </h1>

        <p class="text-white/80 mt-3 text-lg">
            Modern SVG icon rendering using Blade Icons package
        </p>

        <!-- Icons Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-10">

            <!-- Heart -->
            <div class="icon-card bg-white/90 rounded-2xl p-6 shadow-lg flex flex-col items-center">
                <x-icon-heart class="w-14 h-14 text-red-500" />
                <span class="mt-3 font-semibold text-gray-700">Heart</span>
            </div>

            <!-- Menu -->
            <div class="icon-card bg-white/90 rounded-2xl p-6 shadow-lg flex flex-col items-center">
                <x-icon-menu class="w-14 h-14 text-blue-500" />
                <span class="mt-3 font-semibold text-gray-700">Menu</span>
            </div>

            <!-- Search -->
            <div class="icon-card bg-white/90 rounded-2xl p-6 shadow-lg flex flex-col items-center">
                <x-icon-search class="w-14 h-14 text-green-500" />
                <span class="mt-3 font-semibold text-gray-700">Search</span>
            </div>
 

        </div>

        <!-- Divider -->
        <div class="w-24 h-1 bg-white/60 rounded-full mx-auto my-10"></div>

        <!-- Back Button -->
        <a href="/"
           class="inline-block px-6 py-3 bg-white text-indigo-600 font-semibold rounded-full shadow-lg hover:bg-indigo-600 hover:text-white transition">
            ← Back to Welcome
        </a>

        <!-- Footer -->
        <p class="text-white/70 text-sm mt-8">
            © 2026 Laravel Blade Icons Demo
        </p>

    </div>

</body>
</html>
```

---


## Step 6: Web routes

File: routes/web.php

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/icons-demo', function () {
    return view('icons-demo'); // your Blade Icons demo page
});
```

---

## Step 7: Run Project

```bash
php artisan serve
```

Open in browser:

```bash
http://127.0.0.1:8000/icons-demo
```

---

## Output

### Blade Icons

<img width="1917" height="1025" alt="Screenshot 2026-02-11 121952" src="https://github.com/user-attachments/assets/adb20cbb-6c90-41d7-8175-f835c19971c3" />

---

## Project Folder Structure

```
PHP_Laravel12_Blade_Icons/
├─ app/
│  └─ ...
│
├─ config/
│  └─ blade-icons.php        ← Blade Icons config file 
│
├─ database/
│
├─ public/
│
├─ resources/
│  ├─ svg/                   ← Added SVG icons folder
│  │   ├─ heart.svg
│  │   ├─ menu.svg
│  │   └─ search.svg
│  │
│  ├─ views/
│  │   ├─ icons/
│  │   └─ icons-demo.blade.php
│
├─ routes/
│  └─ web.php
│
├─ storage/
├─ vendor/
├─ .env
├─ composer.json
└─ README.md
```
---

Your PHP_Laravel12_Blade_Icons Project is now ready!
<<<<<<< HEAD

=======
>>>>>>> development
