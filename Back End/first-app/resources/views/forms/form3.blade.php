@extends('forms.bootstrap')

@section('content')

    <div class="container my-5">
        <h2>Upload Form</h2>

        {{ Str::words($value, $words, '...') }}

        <form action="{{ route('forms.form3') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />
                {{-- @if ($errors->has('name'))
                <small class="invalid-feedback">{{ $errors->first('name') }}</small>
                @endif --}}
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" />
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-5">Send</button>
        </form>
    </div>

@endsection
