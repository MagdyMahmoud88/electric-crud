@props([
'title'=> 'home page'
])

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" dir="rtl">
    <title> {{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.9/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50">
    <x-nav-link />

    <main class="max-w-4xl mx-auto py-10">
        {{ $slot }}
    </main>


</body>

</html>