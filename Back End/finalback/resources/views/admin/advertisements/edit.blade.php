@extends('admin.app')

@section('title', 'Edit Advertisement')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">Edit Advertisement</h3>
            <form action="{{ route('admin.advertisements.update', $advertisement) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('admin.advertisements._form')

                <button class="btn btn-info"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
