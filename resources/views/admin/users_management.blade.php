@extends('admin._blankpage')

@section('page_header', "Users'Management")

@section('card_title',"Users'Roles")

@section('title','Users Roles')

@section('contents')

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Roles</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datalist as $rs)
            <tr>
                <td>{{$rs->id}}</td>
                <td>
                    @if($rs->profile_photo_path)
                        <img src="{{ Storage::url($rs->profile_photo_path) }}" height="60" alt="..." style="border-radius: 30px">
                    @endif
                </td>
                <td>{{$rs->name}}</td>
                <td>{{$rs->email}}</td>
                <td>{{$rs->phone}}</td>
                <td>{{$rs->address}}</td>
                <td>
                    @foreach ($rs->roles as $row)
                        
                        @if($row->name)
                            {{ $row->name }}
                        @else
                            {{ $rs->role }}
                        @endif

                    @endforeach
                    <a href="{{route('admin_user_role',['id',$rs->id])}}" onclick="return !window.open(this.href, '','top=50 left=100 width=1100, height=700')"><i class="fa fa-plus-circle"></i></a>
                </td>
                <td style="text-align: center"><a href="{{route('admin_user_edit',['id'=>$rs->id])}}" title="Edit"><img src="{{ asset('assets') }}/edit.png" height="28"></a></td><!--EDIT button -->
                <td style="text-align: center"><a href="{{route('admin_user_delete',['id'=>$rs->id])}}" onclick="return confirm('Are you sure you want to delete this?')" title="Delete"><button type="button" class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
    </svg> </button></a></td><!--DELETE button -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection