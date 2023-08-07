@extends('admin.app')

@section('title', 'Add new category')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">Add new Category</h3>
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.categories._form')

                <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
            </form>
        </div>
    </div>
</div>

@endsection
