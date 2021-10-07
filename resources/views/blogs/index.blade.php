@extends('app')

@section('content')
    <div>
        <h3 class="text-center">All Posts</h3><br/>
  
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Tag</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->name}}</td>
                        <td>{{$blog->category}}</td>
                        <td>{{$blog->slug}}</td>
                        <td>{{$blog->tag}}</td>
                        <td>
                            <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('blog.destroy',$blog)}}" method="POST" class="d-inline-block">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


