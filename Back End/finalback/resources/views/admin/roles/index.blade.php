@extends('admin.app')

@section('title', 'All Roles')

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
            <h3 class="title-3 m-b-30">All Roles</h3>
            <div class="table-responsive">

                <table class="table table-top-campaign">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $role) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

