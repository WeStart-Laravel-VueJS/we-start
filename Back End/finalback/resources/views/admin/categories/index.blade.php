@extends('admin.app')

@section('title', 'All Categories')

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
                <table class="table table-top-campaign">
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
            </div>
        </div>
    </div>
</div>

@endsection
