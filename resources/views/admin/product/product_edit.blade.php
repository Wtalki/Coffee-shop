@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{route('product#listPage')}}"><button class="btn btn-primary">Back</button></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit Product</h5>
                    <form method="POST" action="{{route('product#edit')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" value="{{old('name',$product->name)}}" id="form2Example1" class="form-control" placeholder="name" />
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" value="{{old('price',$product->price)}}" id="form2Example1" class="form-control" placeholder="price" />
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
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{old('description',$product->description)}}</textarea>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <select name="category" class="form-select  form-control" aria-label="Default select example">
                                <option value="">Chose Category</option>
                                @foreach ($category as $c)
                                <option value="{{ $c->id }}" @if ($product->category_id == $c->id) selected
                                    @endif>{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary  mb-4 text-center">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection