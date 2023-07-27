<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  </head>
  <body>

    <div class="container my-5">
        <h1>Add new post</h1>

        <form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" />
                @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file"  class="form-control @error('image') is-invalid @enderror" name="image" />
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea placeholder="Content" class="form-control @error('content') is-invalid @enderror" name="content" rows="4">{{ old('content') }}</textarea>
                @error('content')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Tags</label>
                <select class="form-control js-example-basic-single" name="tags[]" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                  </select>
            </div>

            <button class="btn btn-success">Add</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
  </body>
</html>
