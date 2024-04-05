@extends('user.layouts.master')
@section('title','accountDetails')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                @if (Auth::user()->image == null)
                @if(Auth::user()->gender == 'male')
                <img class="img-thumbnail w-100" src="{{asset('default/male.jpg')}}" alt="">
                @elseif (Auth::user()->gender == 'female')
                <img class="img-thumbnail w-100" src="{{asset('default/girl.jpg')}}" alt="">
                @endif
                @else
                <img class="img-thumbnail w-100" src="{{asset('storage/'.Auth::user()->image)}}" alt="">
                @endif
            </div>
            <div class="col-md-6 ftco-animate">
                @if (session('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('updateSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h3 class="mb-4 billing-heading">Account Details</h3>
                <div class="row align-items-end">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Username">Username:</label>
                            <div class="border p-2 rounded border-light">{{Auth::user()->name}}</div>
                        </div>
                        <div class="form-group">
                            <label for="Username">Email:</label>
                            <div class="border p-2 rounded border-light">{{Auth::user()->email}}</div>
                        </div>
                        <div class="form-group">
                            <label for="Username">Phone:</label>
                            <div class="border p-2 rounded border-light">{{Auth::user()->phone}}</div>
                        </div>
                        <div class="form-group">
                            <label for="Username">Gender:</label>
                            <div class="border p-2 rounded border-light">{{Auth::user()->gender}}</div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <a href="{{route('user#accountEdit')}}">
                                        <button class="btn btn-primary py-3 px-4">Edit Account</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </div>
</section> <!-- .section -->
@endsection