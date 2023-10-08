<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote | System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
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
                                <h5>ขื่อ-นามสกุล {{$firstname}} {{$lastname}}</h5>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('home.first') }}" class="btn btn-warning"><i class="fa fa-home"></i></a>
                            </div>
                        </div>               
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped table-success table-bordered border-dark">
                            <thead style="background: #f2f2f2">
                              <tr>
                                <th scope="col" style="width: 5%">Number</th>
                                <th scope="col" style="width: 5%">Image</th>                       
                                <th scope="col" style="width: 600px">Name</th>
                                <th scope="col" style="width: 2px">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($parties as $party)
                                <tr>
                                    <th scope="row">{{$party->number}}</th>
                                    <td class="text-center">
                                        <img src="{{asset($party->image)}}" alt="" width="60">
                                    </td>
                                    <td>{{$party->name}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form id="voteForm{{$party->id}}" action="{{ route('voting', $party->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="party_id" value="{{ $party->id }}">
                                                <button type="button" class="btn btn-success vote-button" data-party-id="{{$party->id}}" data-party-name="{{$party->name}}">
                                                    <i class="fa-solid fa-pen"></i> ลงคะแนน
                                                </button>
                                            </form>                                                                   
                                        </div>
                                    </td>
                                  </tr>
                                @endforeach                   
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        
    @include('layouts.footer')     
      

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const voteButtons = document.querySelectorAll('.vote-button');
    
            voteButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const partyId = button.getAttribute('data-party-id');
                    const partyName = button.getAttribute('data-party-name');  // ดึงชื่อพรรค
    
                    swal({
                        title: "คุณต้องการเลือกพรรคนี้ใช่ไหม?",
                        text: `คุณต้องการเลือกพรรค: ${partyName}`,
                        icon: "warning",
                        buttons: ["ยกเลิก", "ตกลง"],
                        dangerMode: true,
                    })
                    .then((willVote) => {
                        if (willVote) {
                            // Submit the form
                            document.getElementById('voteForm' + partyId).submit();
                        }
                    });
                });
            });
        });
    </script>
    
</body>
</html>  