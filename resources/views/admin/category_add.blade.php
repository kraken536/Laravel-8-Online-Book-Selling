@extends('admin._blankpage')


@section('contents')
<form action ="{{ route('admin_category_create') }}" method ="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Parent</label>
        <select class="form-control" name="parent_id">
            <option value="0" selected="selected">Main Category</option>
            @foreach ($datalist as $rs)
                <option value ={{ $rs->id }}>{{ $rs->title }}</option>
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
        <label class="form-label">Slug</label>
        <input type="text" class="form-control" name="keywords">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option selected="selected">False</option>
            <option>True</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>
@endsection

@section('page_header')
    Adding Categories
@endsection

@section('card_title')
    Adding Form
@endsection
