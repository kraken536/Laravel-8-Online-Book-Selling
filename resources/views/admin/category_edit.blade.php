@extends('admin._blankpage')


@section('contents')
<form action ="{{ route('admin_category_update', ['id' => $data->id]) }}" method ="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Parent</label>
        <select class="form-control" name="parent_id">
            <option value="{{ $data->parent_id }}" selected="selected"></option>
            @foreach ($datalist as $rs)
                <option value ="{{ $rs->id }}">{{ $rs->title }}</option>
            @endforeach
            <option value="0">Main Category</option>
        </select>
    </div>
    <div>
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $data->title }}">
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
    <button type="submit" class="btn btn-primary">Update Category</button>
</form>
@endsection

@section('page_header')
    Edit Categories
@endsection

@section('card_title')
    Editing Form
@endsection

@section('title')
    Edit Page
@endsection