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
                                <th scope="col">name</th>
                                <th scope="col">order code</th>
                                <th scope="col">total amount</th>
                                <th scope="col">status</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $b )
                            <tr class="list">
                                <td class=" align-content-center userId">{{$b->id}}</td>
                                <td class=" align-content-center name">{{$b->user_name}}</td>
                                <td class=" align-content-center ">{{$b->total_amount}}</td>
                                <td class=" align-content-center "><a href="{{route('order#details',$b->order_code)}}">{{$b->order_code}}</a></td>
                                <td class=" align-content-center ">
                                    <select name="" class="changeStatus bg-primary rounded p-2" id="">
                                        <option value="0" @if($b->status == 0) selected @endif>Pendeing</option>
                                        <option value="1" @if($b->status == 1) selected @endif>Success</option>
                                        <option value="2" @if($b->status == 2) selected @endif>Reject</option>
                                    </select>
                                </td>
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
@section('scriptSource')
<script>
    $(function(){
        $('.changeStatus').change(function(){
        $changeStatus=$(this).val();
        $parentNode = $(this).parents('tbody tr');
        $userId = $($parentNode).find('.userId').html();
        $data ={
        'changeStatus' : $changeStatus,
        'userId' : $userId
        }

        $.ajax({
        type: 'get',
        url: 'http://localhost:8000/admin/order/status',
        data: $data,
        dataType: 'json',
        })
        })

        $('#userSearch').on('keyup',function(){
            $input = $('#userSearch').val().toUpperCase();
            $list = $('tbody .list');
            $list.each(function(index,row){
                $status = $(row).find('.changeStatus option:selected').html().toUpperCase().toString();
                $name = $(row).find('.name').html().toUpperCase().toString();
                if($name.indexOf($input) == -1 && $status.indexOf($input) == -1 ){
                    $(row).css('display','none');
                }else{
                    $(row).show();
                }
            })
        })
    })
</script>
@endsection