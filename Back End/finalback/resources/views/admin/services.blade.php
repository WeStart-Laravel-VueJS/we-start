@extends('admin.app')

@section('title', 'All Services')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">All Services</h3>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td><img width="80" src="{{ asset($service->image->path) }}" alt=""></td>
                            <td>{{ $service->name }}</td>
                            <td>${{ $service->price }}</td>
                            <td>{{ $service->category->name_trans }}</td>
                            <td>{{ $service->user->name }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Data Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
