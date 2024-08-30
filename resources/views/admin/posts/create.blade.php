@extends('adminlte::page')

@section('title', 'Create Post')

@section('content_header')
    <h1>Create Post</h1>
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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="short_description">Short Description</label>
            <textarea name="short_description" id="short_description" class="form-control" required>{{ old('short_description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" class="form-control" required>{{ old('long_description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
@stop

@section('js')
    <!-- Include Summernote CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote.min.js"></script>
    <script>
      $(document).ready(function() {
    $('#long_description').summernote({
        height: 800,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture', 'table']], // Include image and table options
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                uploadImage(files[0]);
            }
        }
    });

    // Function to handle image upload
    function uploadImage(file) {
        let data = new FormData();
        data.append('file', file);

        $.ajax({
            url: '{{ route('upload.image') }}', // Ensure this route matches your defined upload route
            method: 'POST',
            data: data,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is sent
            },
            success: function(response) {
                $('#long_description').summernote('insertImage', response.url); // Use response.url to insert the image
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log detailed error response for debugging
                alert('Image upload failed: ' + xhr.responseText); // Display specific error message
            }
        });
    }


    $('#long_description').on('summernote.change', function() {
                adjustHeight();
            });

            // Adjust height on page load
            adjustHeight();

            function adjustHeight() {
                let editor = $('#long_description').next('.note-editor');
                let editable = editor.find('.note-editable');
                let contentHeight = editable.prop('scrollHeight');
                editor.height(contentHeight + 50); // Adjust +50px as needed for padding
            }


});



    </script>
@stop