@extends('admin._blankpage')

@section('javascript')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@endsection


@section('contents')

<form role="form" action="{{route('admin_product_update',['id' => $data->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-control" name="parent_id">
            @foreach ($datalist as $rs)
                <option value ="{{ $rs->id }}" @if($rs->id == $data->category_id) selected="selected" @endif>
                    {{App\Http\Controllers\admin\CategoryController::getParentsTree($rs, $rs->title)}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Title *</label>
        <input type="text" class="form-control" name="title" value="{{ $data->title }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Keywords</label>
        <input type="text" class="form-control" name="keywords" value="{{ $data->keywords }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="{{ $data->description }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price" value="{{ $data->price }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Quantity *</label>
        <input type="number" class="form-control" name="quantity" value="{{ $data->quantity }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Details</label>  
        <textarea id="summernote" name="details">{!! $data->details !!}</textarea>
        <script>
            $('#summernote').summernote({
                tabsize: 4,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
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
        <label class="form-label">Images</label>
        <input type="file" class="form-control" name="image" value="{{$data->image}}">
        
        @if($data->image)
            <img src="{{Storage::url($data->image)}}" height="100" alt="Image">
        @endif
    </div>
    

    <div class="mb-3">
        <label class="form-label">Tax</label>
        <input type="number" class="form-control" name="tax" value="{{$data->tax}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{ $data->slug }}">
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