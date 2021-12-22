@extends('admin._blankpage')

@section('javascript')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@endsection

@section('contents')
<form action = "{{ route('admin_product_store') }}" method ="post" enctype="multipart/form-data">
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
        <label class="form-label">Title *</label>
        <input type="text" class="form-control" name="title" required>
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
        <label class="form-label">Quantity *</label>
        <input type="number" class="form-control" name="quantity" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Details</label>  
        <textarea id="summernote" name="details"></textarea>
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
            ] 
            });
        </script>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
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