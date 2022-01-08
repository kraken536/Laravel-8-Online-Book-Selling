@extends('admin._blankpage_copy')


@section('page_header', 'Review details')
@section('card_title')
    Review: {{$datalist->id}}
@endsection

@section('title','Edit Review Page')

@section('contents')
@include('home.flash-message')
<form action="{{route('admin_review_update',['id'=>$datalist->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Id</label>
        <input type="text" class="form-control" name="id" value="{{$datalist->id}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{$datalist->user->name}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Product</label>
        <input type="text" class="form-control" name="product" value="{{$datalist->product->title}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" class="form-control" name="subject" value="{{$datalist->subject}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Review</label>
        <input type="text" class="form-control" name="review" value="{{$datalist->review}}" disabled>
    </div><div class="mb-3">
        <label class="form-label">Rate</label>
        <input type="text" class="form-control" name="rate" value="{{$datalist->rate}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">IP</label>
        <input type="text" class="form-control" name="ip" value="{{$datalist->IP}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Created Date</label>
        <input type="text" class="form-control" name="created_at" value="{{$datalist->created_at}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Updated Date</label>
        <input type="text" class="form-control" name="updated_at" value="{{$datalist->updated_at}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option selected="selected">{{ $datalist->status }}</option>
            @if ($datalist->status == 'True')
                <option>False</option>    
            @else
                <option>True</option>
            @endif
        </select>
    </div>

    <div style="text-align: center"><button type="submit" class="btn btn-primary">Update Review</button></div>
</form>
@endsection