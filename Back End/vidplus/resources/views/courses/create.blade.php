<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
  </head>
  <body>

    <div class="container my-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2>All Courses</h2>
            <a class="btn btn-dark btn-sm" onclick="history.back()"><i class="fas fa-arrow-left"></i> Return Back</a>
            {{-- <a class="btn btn-dark btn-sm" href="{{ route('courses.index') }}"><i class="fas fa-plus"></i> All Courses</a> --}}
        </div>

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" />
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Instructor</label>
                <input type="text" placeholder="Instructor" class="form-control @error('instructor') is-invalid @enderror" name="instructor" value="{{ old('instructor') }}" />
                @error('instructor')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Hours</label>
                <input type="text" placeholder="Hours" class="form-control @error('hours') is-invalid @enderror" name="hours" value="{{ old('hours') }}" />
                @error('hours')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea placeholder="Content" class="tiny @error('content') is-invalid @enderror" name="content" rows="4">{{ old('content') }}</textarea>
                @error('content')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-5"><i class="fas fa-save"></i> Save</button>
        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.tiny'
        })
    </script>
  </body>
</html>
