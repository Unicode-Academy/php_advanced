<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pageTitle}} - Unicode Academy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
</head>

<body>
    <main class="container py-3">
        <div class="row">
            <div class="col-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </main>
</body>

</html>
