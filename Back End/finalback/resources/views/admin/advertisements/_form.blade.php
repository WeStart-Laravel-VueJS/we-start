<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
            @if ($advertisement->path)
                <img width="80" src="{{ asset($advertisement->path) }}" alt="">
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="link">English Name</label>
            <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $advertisement->link) }}">
            @error('link')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>



</div>
