@extends('admin.app')

@section('title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">Site Settings</h3>

            @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            <form action="{{ route('admin.settings_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-control @error('site_name') is-invalid @enderror" value="{{ old('site_name', settings('site_name')) }}">
                    @error('site_name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="site_logo">Site Logo</label>
                    <input type="file" name="site_logo" id="site_logo" class="form-control @error('site_logo') is-invalid @enderror">
                    @error('site_logo')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    @if (settings('site_logo'))
                        <img width="80" src="{{ asset(settings('site_logo')) }}" alt="">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', settings('facebook')) }}">
                    @error('facebook')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter', settings('twitter')) }}">
                    @error('site_name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ old('linkedin', settings('linkedin')) }}">
                    @error('site_name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="youtube">Youtube</label>
                    <input type="text" name="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror" value="{{ old('youtube', settings('youtube')) }}">
                    @error('site_name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="copyright">Copyright</label>
                    <textarea name="copyright" id="copyright" class="form-control @error('copyright') is-invalid @enderror" rows="4">{{ old('copyright', settings('copyright')) }}</textarea>
                    @error('site_name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
            </form>
        </div>
    </div>
</div>

@endsection
