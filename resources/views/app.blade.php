<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
 
    <title>Build Laravel Vue JS CRUD</title>
 
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <style>
        .bg-light {
            background-color: #eae9e9 !important;

        }
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Build Laravel Vue</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a href="{{route('blog.index')}}" class="nav-item nav-link">Blog List</a>
                    <a href="{{route('blog.create')}}" class="nav-item nav-link">Add Blog</a>
                </div>
            </div>
        </nav>
@if (session('error') || $errors->first())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
        {{ session('error') }}
        {{ $errors->first() }}
        @php
            Session::forget('error');
        @endphp
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        @yield('content')
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '.editor' ) )
            .then( editor => {
                    
            } )
            .catch( error => {
                   
            } );
    </script>
</body>
</html>