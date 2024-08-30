@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    <!-- Responsive table wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped table-sm">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ Str::limit($post->title, 20) }}</td>
                        <td>{{ $post->category->name ?? 'N/A' }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="50" style="object-fit: cover;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ Str::limit($post->short_description, 20) }}</td>
                        <td>{{ Str::limit(strip_tags($post->long_description), 20) }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Pagination Links -->
    {{ $posts->links('admin.utils.pagination') }}
@stop
