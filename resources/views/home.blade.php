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
      .card-hover:hover {
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          transform: translateY(-5px);
          transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
      }
    </style>
</head>
<body>
      @include('layouts.header')
        <!-- Begin page content -->
        <div class="container">
          <img src="https://static1.colliderimages.com/wordpress/wp-content/uploads/2022/03/Hogwarts-Castle.jpg" class="img-fluid" alt="...">

          <div class="px-4 py-5 my-5 text-center">
              <img class="d-block mx-auto mb-4" src="https://e1.pngegg.com/pngimages/608/803/png-clipart-etudiant-texas-am-university-vote-election-impression-election-primaire-livre-inscription-des-electeurs.png" alt="" width="200" height="140">
              <h1 class="display-5 fw-bold text-body-emphasis">ระบบเลือกตั้ง</h1>
              <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">
                  การเลือกตั้งโรงเรียนเป็นกระบวนการที่สำคัญในการสร้างความโปร่งใสและความเชื่อมั่นในการบริหารจัดการโรงเรียน 
                  และการมีความร่วมมือกันระหว่างนักเรียนและโรงเรียนในการพัฒนาศึกษาในพื้นที่นั้น
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                  @if (auth()->check() && auth()->user()->party_id !== null)
                    <span class="btn btn-secondary btn-lg px-4 gap-3 disabled">คุณได้ลงคะแนนแล้ว</span>
                  @else
                    <a href="{{ route('parties.vote') }}" class="btn btn-primary btn-lg px-4 gap-3"><i class="fa-solid fa-pen"></i> ลงคะแนน</a>
                  @endif
                  {{-- <a href="{{route('parties.vote')}}" class="btn btn-primary btn-lg px-4 gap-3"><i class="fa-solid fa-pen"></i> ลงคะแนน</a> --}}
                </div>
              </div>
            </div>
          
            <div class="container mb-5">
              <div class="row">
                  @foreach ($parties as $party)
                      <div class="col-md-3 mb-4">
                          <div class="card card-hover" style="width: 16rem;">
                              <img src="{{asset($party->image)}}" height="200px" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <h5 class="card-title">{{$party->number}}</h5>
                                  <p class="card-text">{{$party->name}}</p>
                                  <a href="{{route('parties.show', $party->id)}}" class="btn btn-primary">รายละเอียด</a>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
        </div>

      @include('layouts.footer')
                  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>





