@extends('layouts.master')

@section('content')
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
                                    <form action="{{ route('voting', $party->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="party_id" value="{{ $party->id }}">
                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-pen"></i> ลงคะแนน</button>
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
@endsection