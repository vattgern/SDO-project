<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>АКВТ</title>
    {{-- ==== BOX ICONS ==== --}}
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="body-pd">

<div class="main-view" id="app">

</div>
<!--===== MAIN JS =====-->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
