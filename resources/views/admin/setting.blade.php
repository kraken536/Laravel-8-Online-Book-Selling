@extends('admin._blankpage')

@section('page_header','Settings')

@section('card_title','Settings Configuration')

@section('title','Settings Page')
    
@section('javascript')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@endsection

@section('contents')

<form action="{{route('admin_setting_update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general" role="tab" aria-controls="home" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#smtpemail" role="tab" aria-controls="profile" aria-selected="false">Smtp Email</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#social_media" role="tab" aria-controls="profile" aria-selected="false">Social Media</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#about_us" role="tab" aria-controls="profile" aria-selected="false">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#reference" role="tab" aria-controls="contact" aria-selected="false">References</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
            <br>
            <div class="mb-3" hidden>
                <label class="form-label">ID</label>
                <input type="text" class="form-control" name="id" value="{{ $data->id }}">
            </div>
            <div class="mb-3">
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
                <label class="form-label">Company</label>
                <input type="text" class="form-control" name="company" value="{{ $data->company }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $data->address }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="mail" value="{{ $data->email }}">
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
        </div>

        <div class="tab-pane fade" id="smtpemail" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <div class="mb-3">
                <label class="form-label">Smtp Server</label>
                <input type="text" class="form-control" name="smtp_server" value="{{ $data->smtpserver }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Smtp Email</label>
                <input type="text" class="form-control" name="smtp_email" value="{{ $data->smtpemail }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Smtp Password</label>
                <input type="password" class="form-control" name="smtp_password" value="{{ $data->smtppassword }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Smtp Port</label>
                <input type="text" class="form-control" name="smtp_port" value="{{ $data->smtpport }}">
            </div>
        </div>

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br>
            <div class="mb-3">
                <label class="form-label">Contact</label>  
                <textarea id="summernote0" name="contact">{{ $data->contact }}</textarea>
                <script>
                    $('#summernote0').summernote({
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
        </div>

        <div class="tab-pane fade" id="social_media" role="tabpanel" aria-labelledby="contact-tab">
            <br>
            <div class="mb-3">
                <label class="form-label">Fax</label>
                <input type="text" class="form-control" name="fax" value="{{ $data->fax }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="text" class="form-control" name="facebook" value="{{ $data->facebook }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input type="text" class="form-control" name="ig" value="{{ $data->instagram }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Twitter</label>
                <input type="text" class="form-control" name="twitter" value="{{ $data->twitter }}">
            </div>
            <div class="mb-3">
                <label class="form-label">YouTube</label>
                <input type="text" class="form-control" name="youtube" value="{{ $data->youtube }}">
            </div>
        </div>

        <div class="tab-pane fade" id="about_us" role="tabpanel" aria-labelledby="contact-tab">
            <br>
            <div class="mb-3">
                <label class="form-label">About Us</label>  
                <textarea id="summernote" name="aboutus">{{ $data->aboutus }}</textarea>
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
        </div>

        <div class="tab-pane fade" id="reference" role="tabpanel" aria-labelledby="contact-tab">
            <br>
            <div class="mb-3">
                <label class="form-label">References</label>  
                <textarea id="summernote2" name="references">{{ $data->references }}</textarea>
                <script>
                    $('#summernote2').summernote({
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
        </div>

    </div>
    <br>
    <button type="submit" class="btn btn-primary">Update Settings</button>
</form>

@endsection
