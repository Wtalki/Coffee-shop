@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="col-4 offset-7">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>
                    <a href="{{route('category#createPage')}}" class="btn btn-primary mb-4 text-center float-right">Create Category</a>
                    <input type="text" name="" class="form-control col-4 mb-3 mt-3" id='userSearch' placeholder="Search name or status" id="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">created_at</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $c )
                            <tr class="list">
                                <td class=" align-content-center userId">{{$c->id}}</td>
                                <td class=" align-content-center name">{{$c->name}}</td>
                                <td class=" align-content-center ">{{$c->created_at->format('j-F-Y')}}</td>
                                <td class=" align-content-center col-2">
                                    <a href="{{route('category#editPage',$c->id)}}" class="ms-4 "><button class="btn bnt-primary bg-primary rounded-circle"><i class="fa-solid fa-edit"></i></button></a>
                                    <a href="{{route('category#delete',$c->id)}}" class="ms-3"><button class="btn bnt-primary bg-danger rounded-circle"><i class="fa-solid fa-trash"></i></button></a>
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