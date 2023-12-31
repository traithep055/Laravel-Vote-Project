<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote | System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        *{
            font-family: 'Kanit', sans-serif;
        }
        .nav li:hover:after {
        width: 100%;
        }
        .nav li::after {
        content: '';
        width: 0%;
        height: 2px;
        background: #00f; /* สีฟ้า */
        display: block;
        margin: auto;
        transition: width 0.5s;
        }
        .nav li:hover:after {
        width: 100%;
        }
        .nav li::after {
        content: '';
        width: 0%;
        height: 2px;
        background: #00f; /* สีฟ้า */
        display: block;
        margin: auto;
        transition: width 0.5s;
        }
    </style>
</head>
<body>
    @include('layouts.header')

        <!-- Begin page content -->
        <div class="container">
            @yield('content')
        </div>
        
    {{-- @include('layouts.footer')      --}}
      

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>