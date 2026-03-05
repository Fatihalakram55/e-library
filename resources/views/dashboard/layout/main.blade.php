{{-- component --}}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale-1.0">
<meta http-equiv="x-UA-Compatible" content="ie=edge">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
@vite('resources/css/dashboard.css')
<title>{{ $title }}</title>

</head>
<body class="text-gray-800 font-inter">
@include('dashboard.partials.sidebar')

<main class="w-full md:w-[calc(100%-256px) ] md:ml-64 bg-gray-200 min-h-screen transition-all main">
@include('dashboard.partials.navbar')

{{-- content --}}
    <div class="p-6">
    @yield('content')
    </div>
{{-- end content --}}
</main>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
</script>

</body>
</html>