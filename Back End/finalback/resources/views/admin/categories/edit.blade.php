@extends('admin.app')

@section('title', 'Edit Category')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">Edit Category</h3>
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('admin.categories._form')

                <button class="btn btn-info"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
