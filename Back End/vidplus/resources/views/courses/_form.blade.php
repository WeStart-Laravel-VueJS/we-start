
<div class="mb-3">
    <label>Name</label>
    <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $course->name??'') }}" />
    @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" />
    @error('image')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
    @php
        if(!empty($course)) {
            $path = public_path('images/'.$course->image??'');
            if(file_exists($path)) {
                $path = asset('images/'.$course->image??'');
            }else {
                $path = asset('images/no-image.png');
            }
        }else {
            $path = asset('images/no-image.png');
        }

    @endphp
    <img width="50" src="{{ $path }}" alt="">
</div>

<div class="mb-3">
    <label>Instructor</label>
    <input type="text" placeholder="Instructor" class="form-control @error('instructor') is-invalid @enderror" name="instructor" value="{{ old('instructor', $course->instructor??'') }}" />
    @error('instructor')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Hours</label>
    <input type="text" placeholder="Hours" class="form-control @error('hours') is-invalid @enderror" name="hours" value="{{ old('hours', $course->hours??'') }}" />
    @error('hours')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea id="myarea" placeholder="Content" class="tiny @error('content') is-invalid @enderror" name="content" rows="4">{{ old('content', $course->content??'') }}</textarea>
    @error('content')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
