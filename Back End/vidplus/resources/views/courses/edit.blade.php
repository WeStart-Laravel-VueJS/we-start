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
            <h2>Update Course</h2>
            <a class="btn btn-dark btn-sm" onclick="history.back()"><i class="fas fa-arrow-left"></i> Return Back</a>
        </div>

        <form action="{{ route('courses.update', $course->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $course->id }}">
            @include('courses._form')

            <button class="btn btn-info px-5"><i class="fas fa-save"></i> Update</button>
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
