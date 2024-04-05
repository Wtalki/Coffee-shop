@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Password Change</h5>
                    <form method="POST" action="{{route('change#password')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline mb-4 mt-4">
                            <input type="password" name="oldPassword" id="form2Example1" class="form-control" placeholder="oldPassword" />
                            @error('oldPassword')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="password" name="newPassword" id="form2Example1" class="form-control" placeholder="newPassword" />
                            @error('newPassword')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="password" name="newConfirmPassword" id="form2Example1" class="form-control" placeholder="newConfirmPassword" />
                            @error('newConfirmPassword')
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