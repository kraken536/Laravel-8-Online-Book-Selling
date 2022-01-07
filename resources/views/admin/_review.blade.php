@extends('admin._blankpage')

@section('page_header', "Users'Reviews")

@section('card_title','Reviews')

@section('title','Reviews')

@section('contents')

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        
        <thead>
            <tr>
                <th>ID</th>
                <th>Parent</th>
                <th style="text-align:center">Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($datalist as $rs) --}}
            <tr>
                <td>id</td>
                <td>
                    {{-- {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}                --}} brolar
                </td>
                <td>b</td>
                <td>r</td>
                <td>o</td>
                <td style="text-align: center"><a href="#" title="Edit" ><img src="{{ asset('assets')}}/edit.png" height="28"></a></td><!--EDIT button -->
                <td style="text-align: center"><a href="#" onclick="return confirm('Are you sure you want to delete this?')" title="Delete"><button type="button" class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
    </svg> </button></a></td><!--DELETE button -->
            </tr>
            
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>


@endsection