<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parties | Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        *{
            font-family: 'Kanit', sans-serif;
        }
    </style>
    {{-- <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
        /* หรือใช้ฟอนต์ที่รองรับภาษาไทยอื่น ๆ */
    </style> --}}
</head>
<body>
    {{-- @include('layouts.header') --}}

        <!-- Begin page content -->
        <div class="container">
            <h1>Generate PDF</h1>
            <a class="btn btn-primary" href="{{route('parties-pdf',['download'=>'pdf'])}}">Download PDF</a>
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Number</th>
                        {{-- <th>โลโก้</th> --}}
                        <th>Name</th>
                        <th>Voter</th>
                    </tr>
                </thead>
                @foreach ($parties as $party)
                    <tr>
                        <td>{{$party->number}}</td>
                        {{-- <td><img src="{{asset($party->image)}}" width="60"></td> --}}
                        <td>{{$party->name}}</td>
                        <td>{{$party->voter}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        
    {{-- @include('layouts.footer')      --}}
      

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>