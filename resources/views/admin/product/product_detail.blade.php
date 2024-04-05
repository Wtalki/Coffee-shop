@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{route('product#listPage')}}"><button class="btn btn-primary">Back</button></a>
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Product Details</h1>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="offset-1 col-3 ">
                            <img class="rounded" style="width:300px;height:300px;" src="{{asset('storage/'.$product->image)}}" alt="">
                        </div>
                        <div class="col-7 offset-1 ">

                            <div class="mt-4">
                                <span class="p-2 h1 text-decoration-underline ">{{$product->name}}</span>
                            </div>
                            <div class="mt-4">

                            </div>
                            <div class="mt-4">
                                <span class="p-2 h4">{{$product->description}}</span>
                            </div>
                            <div class="mt-4 d-flex">
                                <button class="btn btn-primary d-flex align-items-center me-2">
                                    <i class="fa-solid fa-money-bill me-2 fs-3"></i>
                                    <span class="pt-1 h4">{{$product->price}} Kyats</span>
                                </button>
                                <button class="btn btn-warning d-flex align-items-center  me-2">
                                    <i class="fa-solid fa-eye me-2 fs-3"></i>
                                    <span class="pt-1 h4">{{$product->view_count}}</span>
                                </button>
                                <button class="btn btn-success d-flex align-items-center me-2">
                                    <i class="fa-solid fa-list me-2 fs-3"></i>
                                    <span class="pt-1 h4">{{$product->category_name}}</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12  d-flex justify-content-end">
                            <a href="{{route('product#editPage',$product->id)}}">
                                <button class="btn btn-primary  "><i class="fa-solid fa-pen-to-square me-2"></i>Edit Product</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection