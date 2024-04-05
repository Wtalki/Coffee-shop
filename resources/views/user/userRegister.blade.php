@extends('user.layouts.master')

@section('content')
{{-- <section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Register</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Register</span></p>
                </div>

            </div>
        </div>
    </div>
</section> --}}

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <form action="{{route('register')}}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
                    @csrf
                    <h3 class="mb-4 billing-heading">Register</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Username">
                            </div>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            </div>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone">
                            </div>
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gender" value="{{old('gender')}}">Gender</label>
                                <select name="gender" id="" class="form-control text-black">
                                    <option class="text-dark" value="">Choose Option</option>
                                    <option class="text-dark" value="male">Male</option>
                                    <option class="text-dark" value="female">Female</option>
                                </select>
                            </div>
                            @error('gender')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input name='password' type="password" class="form-control" placeholder="Password">
                            </div>
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Password">Password Confirmation</label>
                                <input name='password_confirmation' type="password" class="form-control" placeholder="Password">
                            </div>
                            @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <span>Do you have account? <a class="text-danger" href="{{route('login#page')}}">Login</a></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <button class="btn btn-primary py-3 px-4">Register</button>
                                </div>
                            </div>
                        </div>
                </form><!-- END -->
            </div> <!-- .col-md-8 -->
        </div>
    </div>
    </div>
</section> <!-- .section -->
@endsection