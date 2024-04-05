@extends('user.layouts.master')

@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{route('user#passwordChange')}}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5" enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-4 billing-heading">Account Edit</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Username">Old password</label>
                                <input type="password" name="oldPassword" value="{{old('oldPassword')}}" class="form-control @error('oldPassword') is-invalid @enderror" placeholder="Old password...">
                            </div>
                            @error('oldPassword')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Email">New passwrod</label>
                                <input type="password" name="newPassword" value="{{old('newPassword')}}" class="form-control @error('email') is-invalid @enderror" placeholder="New password...">
                            </div>
                            @error('newPassword')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Phone">New password confirm</label>
                                <input type="password" name="newPasswrdConfirm" value="{{old('newPasswrdConfirm')}}" class="form-control" placeholder="newPasswrdConfirm">
                            </div>
                            @error('newPasswrdConfirm')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <button class="btn btn-primary py-3 px-4">Change Password</button>
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