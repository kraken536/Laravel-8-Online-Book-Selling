@extends('admin._blankpage_copy')


@section('page_header', 'Message details')
@section('card_title')
    Message: {{$datalist->id}}
@endsection

@section('title','Edit Message Page')

@section('contents')
@include('home.flash-message')
<form action="{{route('admin_message_update',['id'=>$datalist->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Id</label>
        <input type="text" class="form-control" name="id" value="{{$datalist->id}}" disabled>
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
        <label class="form-label">Subject</label>
        <input type="text" class="form-control" name="subject" value="{{$datalist->subject}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Message</label>
        <input type="text" class="form-control" name="message" value="{{$datalist->message}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Admin Note</label>
        <textarea class="form-control" name="note" id="note" rows="5">{{$datalist->note}}</textarea>
    </div>

    <div style="text-align: center"><button type="submit" class="btn btn-primary">Send Note</button></div>
</form>
@endsection