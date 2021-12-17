@extends('admin._blankpage')


@section('contents')
<form action ="{{ route('admin_product_update', ['id' => $data->id]) }}" method ="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-control" name="parent_id">
            <option value={{ $data->category_id }} selected="selected"></option>
            @foreach ($datalist as $rs)
                <option value ={{ $rs->id }}>{{ $rs->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value={{ $data->title }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Keywords</label>
        <input type="text" class="form-control" name="keywords" value={{ $data->keywords }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value={{ $data->description }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price" value={{ $data->price }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity" value={{ $data->quantity }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Details</label>
        <input type="text" class="form-control" name="details" value={{ $data->details }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Tax</label>
        <input type="number" class="form-control" name="tax" value={{ $data->tax }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" class="form-control" name="slug" value={{ $data->slug }}>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option selected="selected">{{ $data->status }}</option>
            @if ($data->status == 'True')
                <option>False</option>    
            @else
                <option>True</option>
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
@endsection

@section('page_header')
    Update Products
@endsection

@section('card_title')
    Updating Form
@endsection

@section('title')
    Update Page
@endsection