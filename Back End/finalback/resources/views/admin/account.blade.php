@extends('admin.app')

@section('title', 'Dashboard')

@section('css')
<style>
    img#profile-pic {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 1px dashed #979797;
    padding: 4px;
}
label#img-prev {
    position: relative;
}

label#img-prev span {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    font-size: 12px;
    background: rgba(0,0,0,.2);
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: all .3s ease;
}

label#img-prev:hover span {
    opacity: 1;
    visibility: visible
}
</style>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">Edit your account</h3>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <form action="{{ route('admin.account_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-3">
                        <label id="img-prev" for="image">

                            <img id="profile-pic" src="{{ asset(Auth::user()->pic) }}" alt="">
                            <span>Change your profile</span>
                        </label>
                        <input type="file" id="image" name="image" class="d-none" onchange="readURL(this);">

                        <button type="button" class="btn mt-4 btn-secondary btn-change">Change Password </button>
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', Auth::user()->name) }}">
                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" disabled id="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}">
                            @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="password-wrapper @if(!session('err_old') && !$errors->has('password')) d-none @endif">
                            <div class="mb-3">
                                <label for="old_password">Old Password</label>
                                <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" autocomplete="new-password">
                                @error('old_password')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                @if (session('err_old'))
                                    <small class="text-danger">{{ session('err_old') }}</small>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="password">New Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation">Password confirmation</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <button class="btn btn-success">Update</button>
                    </div>
                </div>



            </form>

        </div>
    </div>
</div>

@endsection


@section('js')
<script>
    document.querySelector('.btn-change').onclick = () => {
        document.querySelector('.password-wrapper').classList.toggle('d-none')
    }

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#profile-pic').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    }
</script>
@stop
