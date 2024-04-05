@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="col-4 offset-8">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Product</h5>
                    <a href="{{route('product#createPage')}}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
                    <input type="text" name="" class="form-control col-4 mb-3 mt-3" id='userSearch' placeholder="Search name or Category" id="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">image</th>
                                <th scope="col">price</th>
                                <th scope="col">view</th>
                                <th scope="col">category</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $product as $p )
                            <tr class="list">
                                <th scope="row" class="align-content-center">{{$p->id}}</th>
                                <td class="align-content-center name">{{$p->name}}</td>
                                <td class="col-2 align-content-center">
                                    <img class="w-50" src="{{asset('storage/'.$p->image)}}" alt="">
                                </td>
                                <td class="align-content-center">{{$p->price}}</td>
                                <td class="align-content-center">{{$p->view_count}}</td>
                                <td class="align-content-center category">{{$p->category_name}}</td>
                                <td class=" align-content-center col-3">
                                    <a href="{{route('product#editPage',$p->id)}}" class="ms-1 "><button class="btn bnt-primary bg-primary rounded-circle"><i class="fa-solid fa-edit"></i></button></a>
                                    <a href="{{route('product#delete',$p->id)}}" class="ms-3"><button class="btn bnt-primary bg-danger rounded-circle"><i class="fa-solid fa-trash"></i></button></a>
                                    <a href="{{route('product#detail',$p->id)}}" class="ms-3"><button class="btn bnt-primary bg-warning rounded-circle"><i class="fa-solid fa-circle-info"></i></button></a>
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
                $category = $(row).find('.category').html().toUpperCase().toString();
                if($name.indexOf($input) == -1 && $category.indexOf($input) == -1){
                    $(row).css('display','none');
                }else{
                    $(row).show();
                }
            })
        })
    })
</script>
@endsection