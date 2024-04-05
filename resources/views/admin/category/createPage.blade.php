@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{route('category#list')}}"><button class="btn btn-primary">Back</button></a>
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Category</h5>
                    <form method="POST" action="{{route('category#create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="category" id="form2Example1" class="form-control" placeholder="category" />
                            @error('category')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <!-- Submit button -->
                        <button class="btn btn-primary mb-4 text-center">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection