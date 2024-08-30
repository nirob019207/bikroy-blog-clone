@extends('adminlte::page')

@section('title', 'Edit Post')

@section('content_header')
    <h1>Edit Post</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            @if ($post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="100">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="short_description">Short Description</label>
            <textarea name="short_description" id="short_description" class="form-control" required>{{ old('short_description', $post->short_description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" class="form-control" required>{{ old('long_description', $post->long_description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Post</button>
    </form>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#long_description').summernote({
                height: auto
            });
        });
    </script>
@stop
