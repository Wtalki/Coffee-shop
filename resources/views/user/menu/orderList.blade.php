@extends('user.layouts.master')

@section('content')
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate bg-transparent">
                <div class="cart-list">
                    <table class="table bg-transparent">
                        <thead class="thead-primary">
                            <tr class="text-center ">
                                <th class="bg-transparent">Name</th>
                                <th class="bg-transparent">Order Code</th>
                                <th class="bg-transparent">Total Amount</th>
                                <th class="bg-transparent">Status</th>
                                <th class="bg-transparent">Date</th>
                                <th class="bg-transparent">Cash</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($order as $o )
                            <tr class="text-center cartList">
                                <td class="price bg-transparent">{{Auth::user()->name}} </td>
                                <td class="price bg-transparent"><a href="#">{{$o->order_code}}</a></td>
                                <td class="price bg-transparent">{{$o->total_amount}}</td>
                                <td class="price bg-transparent">
                                    @if ($o->status == 0)
                                    <h4 class="text-warning">Pending...</h4>
                                    @elseif($o->status == 1)
                                    <h4 class="text-success">Success...</h4>
                                    @else
                                    <h4 class="text-danger">Reject...</h4>
                                    @endif
                                </td>
                                <td class="total bg-transparent total">{{$o->created_at->format('j-F-Y')}}</td>
                                <td class="total bg-transparent total">
                                    @if ($o->status == 0)
                                    <a href="{{route('user#cash',$o->id)}}" class="btn btn-primary border-1 ">Cash</a>
                                    @endif
                                </td>
                            </tr><!-- END TR-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
