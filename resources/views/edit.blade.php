@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Edit Party</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{route('parties.index')}}" class="btn btn-success mx-1">Back</a>
                    </div>
                </div>               
            </div>

            <div class="card-body">
                <form action="{{route('parties.update', $party->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div>
                            <img style="width: 200px" height="200px" src="{{asset($party->image)}}" alt="">
                        </div>
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="number" class="form-label">Number</label>
                        <input type="text" name="number" id="" class="form-control" value="{{$party->number}}">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control" value="{{$party->name}}">
                    </div>
                    <div class="form-group">
                        <label for="leader" class="form-label">Leader</label>
                        <input type="text" name="leader" id="" class="form-control" value="{{$party->leader}}">
                    </div>
                    <div class="form-group">
                        <label for="slogan" class="form-label">Slogan</label>
                        <textarea name="slogan" id="" cols="30" rows="4.5" class="form-control">{{$party->slogan}}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection