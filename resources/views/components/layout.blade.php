@props([
'title'=> 'home page'
])

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title> {{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <x-nav-link />

    <main class="max-w-4xl mx-auto py-10">
        {{ $slot }}
    </main>


</body>

</html>