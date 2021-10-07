@extends('app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($blog,['url' => route('blog.update',$blog->id), 'method' => 'patch', 'enctype' => 'multipart/form-data']) }}
                        @include('blogs.form')
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>
@endsection


