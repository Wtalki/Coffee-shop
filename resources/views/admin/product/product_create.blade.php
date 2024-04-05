@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{route('product#listPage')}}"><button class="btn btn-primary">Back</button></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Product</h5>
                    <form method="POST" action="{{route('product#create')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" value="{{old('name')}}" id="form2Example1" class="form-control" placeholder="name" />
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" value="{{old('price')}}" id="form2Example1" class="form-control" placeholder="price" />
                            @error('price')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{old('description')}}</textarea>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <select name="category" class="form-select  form-control" aria-label="Default select example">
                                <option selected>Choose Type</option>
                                @foreach ($category as $c )
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary  mb-4 text-center">create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection