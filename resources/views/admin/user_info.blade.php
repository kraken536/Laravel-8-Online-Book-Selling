@extends('admin._blankpage_copy')


@section('page_header') Users details @endsection

@section('card_title')
    User: 
@endsection

@section('title') Users details Page @endsection


@section('contents')
@include('home.flash-message')

<form action="{{route('admin_user_store',['id'=>$datalist->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        @if($datalist->profile_photo_path)
            <img src="{{ Storage::url($datalist->profile_photo_path) }}" height="180" alt="..." style="border-radius: 20px">
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{$datalist->name}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="{{$datalist->email}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{$datalist->phone}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="address" value="{{$datalist->address}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Created Date</label>
        <input type="text" class="form-control" name="created_at" value="{{$datalist->created_at}}" disabled>
    </div>
    <div class="mb-3" style="margin-top:2em">
        <label class="form-label" style="text-align: center">Roles: </label>
        <table class="table table-hover table-bordered">
            <thead>
            </thead>
            @foreach ($datalist->roles as $row)
                
                <tr>
                    <td>{{$row->name}}</td>
                    <td><a href="{{route('admin_user_role_delete',['user_id'=>$datalist->id , 'role_id'=>$row->id])}}" onclick="return confirm('Are you sure you want to delete this?')" title="Delete"><button type="button" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
        </svg> </button></a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="mb-3" style="margin-top:3em">
        <label class="form-label">Add Role: </label>
        <select name="role_id">
            @foreach ($position as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select>
    </div>

    <div style="text-align: center"><button type="submit" class="btn btn-primary">Add Role</button></div>
</form>

@endsection