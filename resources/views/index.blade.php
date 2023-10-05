@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>All Parties</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{route('parties.create')}}" class="btn btn-success mx-1">Create</a>
                        <a href="{{route('parties.trashed')}}" class="btn btn-warning">Trashed</a>
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
@endsection