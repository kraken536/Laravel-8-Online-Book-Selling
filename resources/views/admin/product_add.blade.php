@extends('admin._blankpage')


@section('contents')
<form action = "{{ route('admin_product_store') }}" method ="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-control" name="parent_id">
            @foreach ($datalist as $rs)
                <option value ="{{ $rs->id }}">{{ $rs->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label class="form-label">Keywords</label>
        <input type="text" class="form-control" name="keywords">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description">
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price">
    </div>
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity">
    </div>
    <div class="mb-3">
        <label class="form-label">Details</label>
        <input type="text" class="form-control" name="details">
    </div>
    <div class="mb-3">
        <label class="form-label">Tax</label>
        <input type="number" class="form-control" name="tax" value="18">
    </div>
    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" class="form-control" name="slug">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option selected="selected">False</option>
            <option>True</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
@endsection

@section('page_header')
    Adding Products
@endsection

@section('card_title')
    Adding Form
@endsection

@section('title')
    Product Add
@endsection