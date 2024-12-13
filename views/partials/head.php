<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css">
    <title>package manager</title>
</head>
<body class=" bg-slate-700 text-stone-100">
    <nav class="w-full bg-green-500 py-5">
        <div class="max-w-[1200px] flex justify-between items-center px-10 mx-auto">
            <a href="/" class="text-base font-semibold">Package manager</a>
            <div>
            <?php
             echo !isset($_SESSION['username']) ? "<a href='/login' class='font-semibold ml-6 hover:text-purple-700 transition-colors'>Login</a>" : "<a href='/logout' class='font-semibold ml-6 hover:text-purple-700 transition-colors'>Logout</a>";
            ?>
            </div>
        </div>
    </nav>
    <main class=" min-h-[100dvh] relative">