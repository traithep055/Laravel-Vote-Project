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
            <div class="main-content mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>All Parties</h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{url('/parties-create')}}" class="btn btn-success mx-1">Create</a>
                                <a href="{{route('parties.trashed')}}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>               
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped table-bordered border-dark">
                            <thead style="background: #f2f2f2">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 10%">Image</th>
                                <th scope="col" style="width: 10%">Number</th>
                                <th scope="col" style="width: 20%">Name</th>
                                <th scope="col" style="width: 20%">Leader</th>
                                <th scope="col" style="width: 20%">Slogan</th>
                                <th scope="col" style="width: 10%">Voter</th>
                                <th scope="col" style="width: 10%">Publish Date</th>
                                <th scope="col" style="width: 20%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($parties as $party)
                                <tr>
                                    <th scope="row">{{$party->id}}</th>
                                    <td>
                                        <img src="{{asset($party->image)}}" alt="" width="80">
                                    </td>
                                    <td>{{$party->number}}</td>
                                    <td>{{$party->name}}</td>
                                    <td>{{$party->leader}}</td>
                                    <td>{{$party->slogan}}</td>
                                    <td>{{$party->voter}}</td>
                                    <td>{{date('d-m-Y', strtotime($party->created_at))}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('parties.show', $party->id)}}" class="btn btn-success mx-1">Show</a>
                                            <a href="{{route('parties.edit', $party->id)}}" class="btn btn-primary mx-1">Edit</a>
                                            {{-- <a href="" class="btn btn-danger">Delete</a> --}}
        
                                            <form action="{{route('parties.destroy', $party->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                  </tr>
                                @endforeach                   
                            </tbody>
                          </table>
                          {{$parties->links()}}
                    </div>
                </div>
            </div>
        </div>
        
    {{-- @include('layouts.footer')      --}}
      

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>