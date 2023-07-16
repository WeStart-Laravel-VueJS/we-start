<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
  </head>
  <body>

    <div class="container my-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2>All Courses</h2>
            <a class="btn btn-dark btn-sm" href="{{ route('courses.create') }}"><i class="fas fa-plus"></i> Add New Course</a>
        </div>
        {{-- @dump($courses->perPage())
        @dump($courses->currentPage())
        @dump($courses) --}}
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Instructor</th>
                <th>Hours</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>

            @php
            if($courses->currentPage() == 1) {
                $i = 1;
            }else {
                $i = (($courses->currentPage()-1)*$courses->perPage()+1);
            }

            @endphp
            @foreach ($courses as $course)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $course->name }}</td>
                <td>
                    @php
                        $path = public_path('images/'.$course->image);
                        if(file_exists($path)) {
                            $path = asset('images/'.$course->image);
                        }else {
                            $path = asset('images/no-image.png');
                        }
                    @endphp
                    <img width="50" src="{{ $path }}" alt="">
                </td>
                <td>{{ $course->instructor }}</td>
                <td>{{ $course->hours }}</td>
                <td>{{ $course->created_at }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>

                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button"
                            onclick="deleteRow(event)"
                            {{-- onclick="return confirm('Are you sure?')" --}}
                            style="border-top-left-radius: 0;
                            border-bottom-left-radius: 0;" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $courses->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        function deleteRow(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    e.target.closest('form').submit();
                }
            })
        }
    </script>
  </body>
</html>
