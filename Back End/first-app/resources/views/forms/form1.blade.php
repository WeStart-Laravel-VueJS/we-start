@extends('forms.bootstrap')

@section('content')

    <div class="container my-5">
        <h2>Basic Form</h2>
        {{-- @dump($errors->all()) --}}

        {{-- <x-errors /> --}}

        <form action="{{ route('forms.form1') }}" method="POST">
            @csrf
            {{-- {{ csrf_field() }} --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
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
                <label>Email</label>
                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea placeholder="Bio" class="form-control @error('bio') is-invalid @enderror" name="bio" rows="4">{{ old('bio') }}</textarea>
                @error('bio')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-5">Send</button>
        </form>
    </div>

@endsection
