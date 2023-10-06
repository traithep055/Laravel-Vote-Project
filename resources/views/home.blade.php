@extends('layouts.master')

@section('content')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://e1.pngegg.com/pngimages/608/803/png-clipart-etudiant-texas-am-university-vote-election-impression-election-primaire-livre-inscription-des-electeurs.png" alt="" width="200" height="140">
    <h1 class="display-5 fw-bold text-body-emphasis">ระบบเลือกตั้ง</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">
        การเลือกตั้งโรงเรียนเป็นกระบวนการที่สำคัญในการสร้างความโปร่งใสและความเชื่อมั่นในการบริหารจัดการโรงเรียน 
        และการมีความร่วมมือกันระหว่างนักเรียนและโรงเรียนในการพัฒนาศึกษาในพื้นที่นั้น
      </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="" class="btn btn-primary btn-lg px-4 gap-3"><i class="fa-solid fa-pen"></i> ลงคะแนน</a>
      </div>
    </div>
  </div>

  <div class="container mb-5">
    <div class="row">
        @foreach ($parties as $party)
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 16rem;">
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


@endsection