@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline h2">User List</h5>
                    <a href="{{route('admin#list')}}" class="btn btn-primary mb-4 text-center float-right">Admin List</a>
                    <input type="text" name="" class="form-control col-4 mb-3 mt-3" id='userSearch' placeholder="Search" id="">
                    <table class="table">
                        <thead>
                            <tr class="text-center oi-vertical-align-center">
                                <th scope="col">Id</th>
                                <th scope='col'>Image</th>
                                <th scope="col">username</th>
                                <th scope="col">email</th>
                                <th scope='col'>Phone</th>
                                <th scope="col">email</th>
                                <th scope="col">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u )
                            <tr class="text-center list">
                                <th scope="row" class=" align-content-center userId">{{$u->id}}</th>
                                <td class="col-2 align-content-center">

                                    @if ($u->image == null)
                                    @if (Auth::user()->gender == 'female')
                                    <img class="img-thumbnail" src="{{asset('default/girl.jpg')}}" alt="">
                                    @else
                                    <img class="img-thumbnail" src="{{asset('default/male.jpg')}}" alt="">
                                    @endif
                                    @else
                                    <img class="img-thumbnail" src="{{asset('storage/'.$u->image)}}" alt="">
                                    @endif
                                </td>
                                <td class=" align-content-center name">{{$u->name}}</td>
                                <td class=" align-content-center ">{{$u->email}}</td>
                                <td class=" align-content-center ">{{$u->phone}}</td>
                                <td class=" align-content-center ">{{$u->gender}}</td>
                                <td class=" align-content-center ">
                                    <select class="changeRole" id="changeRole">
                                        <option value="admin" @if($u->role == 'amdin') selected @endif>Admin</option>
                                        <option value="user" @if($u->role == 'user') selected @endif>User</option>
                                    </select>
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
        $('.changeRole').change(function(){
            $changeRole=$(this).val();
            $parentNode = $(this).parents('tbody tr');
            $userId = $($parentNode).find('.userId').html();
            console.log($userId);
            $data ={
                'changeRole' : $changeRole,
                'userId' : $userId
            }
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/admin/change/role',
                data: $data,
                dataType: 'json',
                success:function(response){
                    if(response.status == 'success'){
                        location.reload();
                    }
                }
            })

        })
        $('#userSearch').on('keyup',function(){
            $input = $('#userSearch').val().toUpperCase();
            $list = $('tbody .list');
            $list.each(function(index,row){
                    $name  = $(row).find('.name').html().toUpperCase().toString();
                    if($name.indexOf($input) == -1){
                        $(row).css('display','none');
                    }else{
                        $(row).show();
                    }
            })
        })


    })
</script>
@endsection