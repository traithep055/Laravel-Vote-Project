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
                        <h4>Create Party</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{route('parties.index')}}" class="btn btn-success">Back</a>
                    </div>
                </div>               
            </div>

            <div class="card-body">
                <form action="{{route('parties.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Number</label>
                        <input type="text" name="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="leader" class="form-label">Leader</label>
                        <input type="text" name="leader" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="slogan" class="form-label">Slogan</label>
                        <textarea name="slogan" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection