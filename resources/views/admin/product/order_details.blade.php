@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>
                    <input type="text" name="" class="form-control col-4 mb-3 mt-3" id='userSearch' placeholder="Search name or status" id="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">product name</th>
                                <th scope="col">image</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total price</th>
                                <th scope="col">order code</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderList as $b )
                            <tr class="list">
                                <td class=" align-content-center userId">{{$b->id}}</td>
                                <td class=" align-content-center name">{{$b->user_name}}</td>
                                <td class=" align-content-center ">{{$b->product_name}}</td>
                                <td class=" align-content-center col-2">
                                    <img src="{{asset('storage/'.$b->product_image)}}" class="w-100" alt="">
                                </td>
                                <td class=" align-content-center ">{{$b->quantity}}</td>
                                <td class=" align-content-center ">{{$b->total_price}} Kyats</td>
                                <td class=" align-content-center ">{{$b->order_code}}</td>
                                <td class=" align-content-center ">{{$b->created_at->format('j-F-Y')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection