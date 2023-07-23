<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Trashed Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @if(app()->getLocale() == 'ar')
    <style>
        body {
            direction: rtl;
            text-align: right;
        }

    </style>
    @endif
  </head>
  <body>

    {{-- {{ app()->currentLocale() }} --}}
    {{-- {{ app()->getLocale() }} --}}

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Select Language
        </button>
        <ul class="dropdown-menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img width="20" src="{{ asset('images/'.$properties["flag"].'.png') }}" alt="">
                    {{ $properties['native'] }}</a></li>
            @endforeach
        </ul>
      </div>

    <div class="container my-5">
        {{-- <select onchange="window.location.href = this.value">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </option>
            @endforeach
        </select> --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2>{{ __('site.all_courses') }}</h2>
            <div>
                <a class="btn btn-warning btn-sm" href="{{ route('courses.index') }}"><i class="fas fa-heart"></i> {{ __('site.all_courses') }}</a>
            </div>
        </div>
        <div class="course-wrapper">
            @include('courses._table')
        </div>
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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#myarea',
            height: 250
        })
    </script>

    <script>

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if(session('msg'))
            Toast.fire({
                icon: '{{ session("type") }}',
                title: '{{ session("msg") }}'
            })
        @endif

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
                    // e.target.closest('form').submit();
                    axios.delete(e.target.closest('form').action)
                    .then(res => {
                        let wrapper = document.querySelector('.course-wrapper');
                        wrapper.innerHTML = res.data.courses

                        if(res.data.status) {
                            Toast.fire({
                                icon: 'success',
                                title: res.data.msg
                            })
                        }

                    })
                    .catch(err => {
                        console.log(err);
                    })
                }
            })
        }
    </script>
  </body>
</html>
