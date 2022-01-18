@extends('admin._blankpage')

@section('javascript')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@endsection


@section('page_header','Updating FAQ')

@section('card_title')
Updating FAQ Form
@endsection

@section('title','FAQ Update')

@section('contents')
<form action="{{route('admin_faq_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Position</label>
        <input type="number" class="form-control" name="position" value="{{$data->position}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Question</label>
        <input type="text" class="form-control" name="question" value="{{$data->question}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Answer</label>  
        <textarea id="summernote" name="answer">{{$data->answer}}</textarea>
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 120,
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
            <option selected="selected">{{ $data->status }}</option>
            @if ($data->status == 'True')
                <option>False</option>    
            @else
                <option>True</option>
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update FAQ</button>
</form>
@endsection
