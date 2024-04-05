@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit Product</h5>
                    <form method="POST" action="{{route('account#edit')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" value="{{old('name',Auth::user()->name)}}" id="form2Example1" class="form-control" placeholder="name" />
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="email" value="{{old('email',Auth::user()->email)}}" id="form2Example1" class="form-control" placeholder="email" />
                            @error('eamil')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="phone" value="{{old('phone',Auth::user()->phone)}}" id="form2Example1" class="form-control" placeholder="phone" />
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <!-- Submit button -->
                        <button class="btn btn-primary mb-4 text-center">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection