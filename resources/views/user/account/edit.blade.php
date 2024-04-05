@extends('user.layouts.master')

@section('content')

<section class="ftco-section">
    <div class="container">

        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-start ftco-animate">
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
            <div class="col-md-8 ftco-animate">
                <form action="{{route('user#accountUpdate')}}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5" enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-4 billing-heading">Account Edit</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="name" value="{{old('name',Auth::user()->name)}}" class="form-control @error('name') is-invalid @enderror" placeholder="Username">
                            </div>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email" value="{{old('email',Auth::user()->email)}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            </div>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" name="phone" value="{{old('phone',Auth::user()->phone)}}" class="form-control" placeholder="Phone">
                            </div>
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="file" name="postImage" class="form-control ">
                            </div>
                            @error('postImage')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gender" value="{{old('gender')}}">Gender</label>
                                <select name="gender" id="" class="form-control text-black">
                                    <option class="text-dark" value="">Choose Option</option>
                                    <option class="text-dark" value="male" @if(Auth::user()->gender == 'male') selected @endif>Male</option>
                                    <option class="text-dark" value="female" @if(Auth::user()->gender == 'female') selected @endif>Female</option>
                                </select>
                            </div>
                            @error('gender')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <button class="btn btn-primary py-3 px-4">Update</button>
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
