@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Account Details</h1>
                </div>
                <div class="card-body ">
                    @if (session('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('updateSuccess')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="offset-1 col-3 ">
                            @if (Auth::user()->image == null)
                            @if (Auth::user()->gender == 'male')
                            <img class="rounded-circle" style="width:300px;height:300px;" src="{{asset('default/male.jpg')}}" alt="">
                            @else
                            <img class="rounded-circle" style="width:300px;height:300px;" src="{{asset('default/girl.jpg')}}" alt="">
                            @endif
                            @else
                            <img class="rounded-circle" style="width:300px;height:300px;" src="{{asset('storage/'.Auth::user()->image)}}" alt="">
                            @endif
                        </div>
                        <div class="col-7 offset-1 ">
                            <div class="mt-4">
                                <i class="fa-regular fa-user me-2"></i>
                                <span class="p-2 h3">{{Auth::user()->name}}</span>
                            </div>
                            <div class="mt-4">
                                <i class="fa-regular fa-envelope"></i>
                                <span class="p-2 h3">{{Auth::user()->email}}</span>
                            </div>
                            <div class="mt-4">
                                <i class="fa-solid fa-phone"></i>
                                <span class="p-2 h3">{{Auth::user()->phone}}</span>
                            </div>
                            <div class="mt-4">
                                <i class="fa-solid fa-venus-double"></i>
                                <span class="p-2 h3">{{Auth::user()->gender}}</span>
                            </div>
                        </div>
                        <div class="col-12  d-flex justify-content-end">
                            <a href="{{route('account#editPage')}}">
                                <button class="btn btn-primary  "><i class="fa-solid fa-pen-to-square me-2"></i>Edit account</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection