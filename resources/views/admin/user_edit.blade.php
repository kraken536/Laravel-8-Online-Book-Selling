@extends('admin._blankpage')

@section('page_header',"Update Users'Data")

@section('card_title','Updating Form')

@section('title','Update User Page')

@section('contents')

<form role="form" action="{{route('admin_user_update',['id' => $data->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $data->email }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="address" value="{{ $data->address }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image" value="{{$data->profile_photo_path}}">
        
        @if($data->profile_photo_path)
            <img src="{{Storage::url($data->profile_photo_path)}}" height="200" alt="Image" style="border-radius: 20px">
        @endif
    </div>
    
    <button type="submit" class="btn btn-primary">Update Account</button>
</form>

@endsection
