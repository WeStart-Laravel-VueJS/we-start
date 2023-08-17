@extends('admin.app')

@section('title', 'All Advertisements')

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
            <h3 class="title-3 m-b-30">All Advertisements</h3>
            <div class="table-responsive">

                <table class="table table-top-campaign">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($advertisements as $advertisement)
                        <tr>
                            <td>{{ $advertisement->id }}</td>
                            <td><img width="60" src="{{ asset($advertisement->path) }}" alt=""></td>
                            <td>{{ $advertisement->link }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.advertisements.edit', $advertisement) }}"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('admin.advertisements.destroy', $advertisement) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $advertisements->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

