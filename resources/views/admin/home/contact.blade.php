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
                                <th scope="col">email</th>
                                <th scope="col">subject</th>
                                <th scope="col">message</th>
                                <th scope="col">created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $b )
                            <tr class="list">
                                <td class=" align-content-center userId">{{$b->id}}</td>
                                <td class=" align-content-center name">{{$b->name}}</td>
                                <td class=" align-content-center ">{{$b->email}}</td>
                                <td class=" align-content-center ">{{$b->subject}}</td>
                                <td class=" align-content-center ">{{$b->message}}</td>
                                <td class=" align-content-center ">{{$b->created_at->format('j-F-Y')}}</td>
                                <td class=" align-content-center ">
                                    <a href="{{route('contact#delete',$b->id)}}" class="btn btn-primary">delete</a>
                                </td>
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
        $('#userSearch').on('keyup',function(){
            $input = $('#userSearch').val().toUpperCase();
            $list = $('tbody .list');
            $list.each(function(index,row){
                $name = $(row).find('.name').html().toUpperCase().toString();
                if($name.indexOf($input) == -1 ){
                    $(row).css('display','none');
                }else{
                    $(row).show();
                }
            })
        })
    })
</script>
@endsection