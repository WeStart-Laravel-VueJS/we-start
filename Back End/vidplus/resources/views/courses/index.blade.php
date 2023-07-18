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
            <tr id="row_{{ $course->id }}">
                <td>{{ $i++ }}</td>
                <td>{{ $course->name }}</td>
                <td>
                    {{-- @php
                        $path = public_path('images/'.$course->image);
                        if(file_exists($path)) {
                            $path = asset('images/'.$course->image);
                        }else {
                            $path = asset('images/no-image.png');
                        }
                    @endphp
                    <img width="50" src="{{ $path }}" alt=""> --}}
                    <img width="50" src="{{ $course->image }}" alt="">
                </td>
                <td>{{ $course->instructor }}</td>
                <td>{{ $course->hours }}</td>
                <td>{{ $course->created_at }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

                        <a

                        data-id="{{ $course->id }}"
                        data-name="{{ $course->name }}"
                        data-image="{{ $course->image }}"
                        data-instructor="{{ $course->instructor }}"
                        data-hours="{{ $course->hours }}"
                        data-content="{{ $course->content }}"

                        href="{{ route('courses.update', $course->slug) }}" data-bs-toggle="modal" data-bs-target="#EditModal" class="btn btn-success btn-sm btn-edit"><i class="fas fa-edit"></i></a>

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
        @php
            $course = [];
        @endphp
        {{ $courses->links() }}
    </div>


    <!-- Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="">
                    @include('courses._form')

                    <button class="btn btn-info px-5"><i class="fas fa-save"></i> Update</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#myarea',
            height: 250
        })
    </script>

    <script>

        $('.btn-edit').click(function() {
            let url = $(this).attr('href')
            let id = $(this).data('id')
            let name = $(this).data('name')
            let image = $(this).data('image')
            let instructor = $(this).data('instructor')
            let hours = $(this).data('hours')
            let content = $(this).data('content')

            $('.modal [name=id]').val(id)
            $('.modal [name=name]').val(name)
            $('.modal img').attr('src', image)
            $('.modal [name=instructor]').val(instructor)
            $('.modal [name=hours]').val(hours)
            tinymce.get("myarea").setContent(content);
            $('.modal form').attr('action', url)
        })

        $('.modal form').submit(function(e) {
            e.preventDefault();

            let content = tinymce.get("myarea").getContent();

            let url = $(this).attr('action');
            let data = new FormData(this)
            data.append('content', content)

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    let imgpath = '{{ asset("images") }}/' + res.course.image
                    $('#row_'+res.course.id+' td:nth-child(2)').text(res.course.name)
                    $('#row_'+res.course.id+' td:nth-child(3) img').attr('src', imgpath)
                    $('#row_'+res.course.id+' td:nth-child(4)').text(res.course.instructor)
                    $('#row_'+res.course.id+' td:nth-child(5)').text(res.course.hours)

                    $('.modal').modal('hide');

                    // const truck_modal = document.querySelector('#EditModal');
                    // const modal = bootstrap.Modal.getInstance(truck_modal);
                    // modal.hide();
                },
                error: function(err) {
                    console.log(err);
                }
            })
        })

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
