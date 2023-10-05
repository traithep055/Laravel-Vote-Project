@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Show Party</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{route('parties.index')}}" class="btn btn-success mx-1">Back</a>
                    </div>
                </div>               
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <tbody>
                        
                        {{-- <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                <img src="{{asset($post->image)}}" alt="" width="80">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category_id}}</td>
                            <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                            <td>
                                <a href="" class="btn btn-success">Show</a>
                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                          </tr> --}}
                        
                          {{-- <tr>
                            <td>Id</td>
                            <td>{{$post->id}}</td>
                          </tr> --}}
                          <tr>
                            <td>Image</td>
                            <td><img width="300px"  src="{{asset($party->image)}}" alt=""></td>
                          </tr>
                          <tr>
                            <td>Number</td>
                            <td>{{$party->number}}</td>
                          </tr>
                          <tr>
                            <td>Name</td>
                            <td>{{$party->name}}</td>
                          </tr>
                          <tr>
                            <td>Leader</td>
                            <td>{{$party->leader}}</td>
                          </tr>
                          <tr>
                            <td>Slogan</td>
                            <td>{{$party->slogan}}</td>
                          </tr>
                          <tr>
                            <td>Voter</td>
                            <td>{{$party->voter}}</td>
                          </tr>
                          <tr>
                            <td>Publish Date</td>
                            <td>{{date('d-m-Y', strtotime($party->created_at))}}</td>
                          </tr>

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection