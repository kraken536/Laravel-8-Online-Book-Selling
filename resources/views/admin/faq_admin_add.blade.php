@extends('admin._blankpage')

@section('javascript')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
@endsection

@section('page_header','Adding FAQ')

@section('card_title','Adding FAQ Form')

@section('title','FAQ Add')

@section('contents')
<form action="{{route('admin_faq_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Position</label>
        <input type="number" class="form-control" name="position" value="0">
    </div>
    <div class="mb-3">
        <label class="form-label">Question</label>
        <input type="text" class="form-control" name="question" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Answer</label>  
        <textarea id="summernote" name="answer" required></textarea>
        <script>
            $('#summernote').summernote({
                tabsize: 3,
                height: 200,
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
        <label class="form-label">Status</label>
        <select class="form-control" name="status">
            <option selected="selected">False</option>
            <option>True</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add FAQ</button>
</form>
@endsection
