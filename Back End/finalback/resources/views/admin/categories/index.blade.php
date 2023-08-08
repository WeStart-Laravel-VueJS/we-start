@extends('admin.app')

@section('title', 'All Categories')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@stop

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>


<script>
// let table = new DataTable('#myTable', {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pdf','print'
        ]
});
// var table = $('.data-table').DataTable({
//         processing: true,
//         serverSide: true,
//         pageLength: 50,
//         dom: 'Bfrtip',
//         buttons: [
//             'copy', 'excelFlash', 'excel', 'pdf', 'print',{
//             text: 'Reload',
//             action: function ( e, dt, node, config ) {
//                 dt.ajax.reload();
//             }
//         }
//         ],
//         ajax: "{{ route('admin.categories.index') }}",
//         columns: [
//             {data: 'id', name: 'id'},
//             {data: 'name', name: 'name'},
//             {data: 'image', name: 'image'},
//             // {data: 'email', name: 'email'},
//             {data: 'action', name: 'action', orderable: false, searchable: false},
//         ]
// });
</script>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            @if (session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <h3 class="title-3 m-b-30">All Categories</h3>
            <div class="table-responsive">
                {{-- <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> --}}
                <table id="myTable" class="table table-top-campaign">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Services Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><img width="60" src="{{ asset($category->image->path) }}" alt=""></td>
                            <td>{{ $category->name_trans }}</td>
                            <td>{{ $category->parent->name_trans }}</td>
                            <td>{{ $category->services_count }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

