<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>@yield('title') | {{config('app.name')}}</title>
</head>

<body>
    <header class="bg-green-300 shadow-md">
        <div class="lg:container py-1 m-auto">
            <a href="{{route('index')}}" class="pl-5 md:pl-0 text-white text-3xl text-bold"><i class="fab fa-viacoin text-white"></i>-ledger</a>
        </div>
    </header>
    @yield('content')
</body>

</html>