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
            <img width="50" src="{{ $course->image }}" alt="">
        </td>
        <td>{{ $course->instructor }}</td>
        <td>{{ $course->hours }}</td>
        {{-- <td>{{ $course->created_at->format('d M, Y') }}</td> --}}
        <td>{{ $course->created_at->diffForHumans() }}</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

                @if (request()->routeIs('courses.trash'))

                <a class="btn btn-warning btn-sm" href="{{ route('courses.restore', $course->slug) }}"><i class="fas fa-undo"></i></a>

                <a onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm" href="{{ route('courses.forcedelete', $course->slug) }}"><i class="fas fa-times"></i></a>

                @else
                <a

                data-id="{{ $course->id }}"
                data-name="{{ $course->name }}"
                data-image="{{ $course->image }}"
                data-instructor="{{ $course->instructor }}"
                data-hours="{{ $course->hours }}"
                data-content="{{ $course->content }}"

                href="{{ route('courses.update', $course->slug) }}" data-bs-toggle="modal" data-bs-target="#EditModal" class="btn btn-success btn-sm btn-edit"><i class="fas fa-edit"></i></a>

                <form action="{{ route('courses.destroy', $course->slug) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button"
                    onclick="deleteRow(event)"
                    {{-- onclick="return confirm('Are you sure?')" --}}
                    style="border-top-left-radius: 0;
                    border-bottom-left-radius: 0;" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
                @endif


            </div>
        </td>
    </tr>
    @endforeach
</table>
@php
    $course = [];
@endphp
{{ $courses->links() }}
