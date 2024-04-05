@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{route('category#list')}}"><button class="btn btn-primary">Back</button></a>
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit Category</h5>
                    <form method="POST" action="{{route('category#edit')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline mb-4 mt-4">
                            <input type="hidden" name="id" value="{{$category->id}}" id="">
                            <input type="text" name="category" value="{{$category->name}}" id="form2Example1" class="form-control" placeholder="edit category" />
                            @error('category')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <!-- Submit button -->
                        <button class="btn btn-primary mb-4 text-center">Edit Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection